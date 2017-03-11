@extends('layouts.app')
@section('content')
<teacher-header></teacher-header>

<section class="section">
    
    <div class="container">
        
        <div class="columns is-desktop">
          <div class="column">
            <teacher-course></teacher-course>
          </div>
          <div class="column">
            <teacher-course></teacher-course>
          </div>
          <div class="column">
            <teacher-course></teacher-course>
          </div>
          <div class="column">
            <teacher-course></teacher-course>
          </div>        
        </div>

    </div>

</section>


<teacher-footer ></teacher-footer>


@endsection
