@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection
@section('page-style')
	<link href="{{asset('plugins/owl/owl.carousel.css')}}" rel="stylesheet">
	<link href="{{asset('plugins/owl/owl.theme.css')}}" rel="stylesheet">
	<link href="{{asset('plugins/owl/owl.transitions.css')}}" rel="stylesheet">
@endsection

@section('main-content')

	<div class="page no-control" >
		<div class="container spark-screen" style="padding-top: 0; padding-bottom: 0;">
			<div class="wrap full-relative" style="margin-top: 50px;">
				<div class="app-container">

					<div id="owl" class="owl-carousel">

					</div>
					<form id="questions" data-target="#owl" >
						<input type="hidden" name="caseId" value="{{$case->id}}">
						<input type="hidden" name="target" value="{{URL::route('api') . '/case/questions'}}">
					</form>
					<div class="info-panel">
						<div class="dots pull-left">
							<div class="count">Spørgsmål: <span id="q_count"></span></div>
						</div>
						<button type="button" id="nextQuestion" class="btn btn-block btn-primary next pull-right">Næste</button>
						<button style="display:none; margin: 0;" type="button" id="sendAnswer" class="btn btn-block btn-success next pull-right">Afslut</button>
					</div>


					<button type="button" v-on="click: showMod = !showMod">Show Modal</button>
					<modal title="Modal" show="@{{@showMod}}" effect="fade" width="400">
						<content>This is the modal body with an attribute {someDataModel.someAttribute}</content>
					</modal>

				</div>
			</div>
		</div>
	</div>
@endsection

@section('page-scripts')
	<script src="{{asset('plugins/owl/owl.carousel.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			var owl;
			getCall('#questions', {} ,function (resp, target) {
				var data = resp['data'];
				data.forEach(function (question) {
					target.append(''
							+'<div>'
							+'<h1 style="margin-bottom: 30px" class="text-center">'+question.content+'</h1>'
							+'<textarea id="'+question.id+'" style="resize: none;max-width:100%; font-size: 1.3em;" class="form-control" rows="10"></textarea>'
							+'</div>')
					$('.dots').append('<div style="cursor:pointer !important;margin:2.5px !important"class="dot"></div>');
				});
				$('.dot').click(function(){
					var owlData = $("#owl").data('owlCarousel');
					owlData.goTo($(this).index()-1);
				});
				owl = $("#owl").owlCarousel({
					loop : true,
					items : 1,
					slideSpeed : 300,
					pagination : false,
					singleItem:true,
					mouseDrag: false,

					afterAction : afterAction
				});
			});


			function afterAction(){

				//Get some info on the slider.
				current = this.owl.currentItem;
				length = this.owl.owlItems.length;

				$('#q_count').html(current+1);
				//Set the correct button
				if(current === length - 1){
					$('#nextQuestion').hide();
					$('#sendAnswer').fadeIn();
				}else{
					$('#sendAnswer').hide();
					$('#nextQuestion').fadeIn();
				}

				//Set the correct dot colors
				var i = current + 1;
				var dots = $('.dots').children('.dot').each(function(){
					if(i > 0){
						$(this).addClass('complete');
					}else{
						$(this).removeClass('complete');
					}
					i--;
				})


			}
			$('#nextQuestion').click(function() {
				if(current < length - 1) {
					owl.trigger('owl.next');
				}
			});

			$(document).keydown(function (e)
			{
				var keycode1 = (e.keyCode ? e.keyCode : e.which);
				if (keycode1 == 0 || keycode1 == 9) {
					e.preventDefault();
					e.stopPropagation();
					if(current < length - 1) {
						owl.trigger('owl.next');
					}
				}
			});
		});

	</script>



	<script>

		new Vue({
			el:'#app',
			components: {
				'modal':VueStrap.modal
			},
			data: {
				showMod: false,
				sortKey: '',
				reverse:false,
				someDataModel: {
					someAttribute: 'test'
				}
			},
			ready:function(){
				this.fetchMessages();
			},
			methods:{
				sortBy:function(sortKey){
					this.reverse = (this.sortKey == sortKey)?!this.reverse :false;
					this.sortKey=sortKey;
				},
				fetchMessages:function() {
					this.$http.get('/admin/slider',function(slides){
						this.$set('slides',slides);
					});
				}
			}
		});
	</script>

@endsection