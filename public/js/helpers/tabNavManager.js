var TabNavManager = {
  currendTab: null,

  init: function () {
    this.initButtonState();
    this.registerEvents();
  },
  initButtonState: function () {
    // todo  use this function to preinitialize buttons state if required
  },
  registerEvents: function () {

    $('#navigationButtonWrapper .f_tab_nav').on('click', function (ev) {
      this.currendTab = $('#sideBareList').find('.open').find('.active');

      var actionType = $(ev.target).attr('data-action-type');
      var url = this.getLocationUrlByEventType(actionType);
      console.log(typeof url);
      if(typeof url !== 'undefined'){
        window.location.href = url;
      }

    }.bind(this));
  },

  getLocationUrlByEventType: function (actionType) {
    switch (actionType) {
      case 'next':

        var href = this.currendTab.next().find('a').attr('href');
        if(typeof href == 'undefined'){

          href = this.currendTab.parents('.active').nextAll('.f_category_wrapper').first().find('.sub-menu').find('li').first().find('a').attr('href');
        }
        return href;
        break;
      case 'prev':

        var href = this.currendTab.prev().find('a').attr('href');
        if(typeof href == 'undefined'){

          href = this.currendTab.parents('.active').prevAll('.f_category_wrapper').first().find('.sub-menu').find('li').first().find('a').attr('href');
        }
        return href;
        break;
      default:
        return;


    }

  }

}
