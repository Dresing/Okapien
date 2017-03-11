<template>
  
  <div class="phone-viewport">
  <md-toolbar>
    <md-button class="md-icon-button" @click.native="toggleLeftSidenav">
      <md-icon>menu</md-icon>
    </md-button>

    <h2 class="md-title">Okapien</h2>
  </md-toolbar>

  <md-sidenav class="md-left" ref="leftSidenav" @open="open('Left')" @close="close('Left')">
    <md-toolbar class="md-large">
      <div class="md-toolbar-container">

      </div>
    </md-toolbar>
<div class="phone-viewport">
  <md-list>
    <md-subheader>Navigation</md-subheader>

    <md-list-item>
      <md-icon>move_to_inbox</md-icon> <span>Inbox</span>
    </md-list-item>

    <md-list-item>
      <md-icon>send</md-icon> <span>Outbox</span>
    </md-list-item>

    <md-list-item>
      <md-icon>delete</md-icon> <span>Trash</span>
    </md-list-item>

    <md-list-item>
      <md-icon>error</md-icon> <span>Spam</span>

      <md-divider class="md-inset"></md-divider>
    </md-list-item>

    <md-subheader>Contacts</md-subheader>

    <md-list-item>
      <md-ink-ripple />
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Abbey Christansen</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon class="md-primary">chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Alex Nelson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon class="md-primary">chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>

    <md-list-item>
      <md-avatar class="md-avatar-icon">
        <md-icon>people</md-icon>
      </md-avatar>

      <span>Mary Johnson</span>

      <md-button class="md-icon-button md-list-action">
        <md-icon>chat_bubble</md-icon>
      </md-button>
    </md-list-item>
  </md-list>
</div>
  </md-sidenav>


</div>
</template>

<script>
  export default {
  methods: {
    toggleLeftSidenav() {
      this.$refs.leftSidenav.toggle();
    },
    toggleRightSidenav() {
      this.$refs.rightSidenav.toggle();
    },
    closeRightSidenav() {
      this.$refs.rightSidenav.close();
    },
    open(ref) {
      console.log('Opened: ' + ref);
    },
    close(ref) {
      console.log('Closed: ' + ref);
    }
  }
};
</script>

<style lang="scss" scoped>
  
  .fixed-top{
    position: fixed;
    top: 0;
    z-index: 9999;
    width: 100%;
  }
</style>