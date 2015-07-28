(function($){
  $(function(){

    $('.button-collapse').sideNav();

 //    //
    // $('#modal1').openModal();
 //    //
	// $('#modal1').closeModal();
	// //
	$('.modal-trigger').leanModal({
	  dismissible: false, // Modal之外可以被点击 Modal can be dismissed by clicking outside of the modal
	  opacity: .5, // Modal背景不透明  Opacity of modal background
	  in_duration: 300, // 打开时间 Transition in duration
	  out_duration: 300, // 关闭时间 Transition out duration
	  ready: function() { console.log('Ready'); }, // 回调Modal开 Callback for Modal open
	  complete: function() { console.log('Closed'); } // 回调Modal关闭 Callback for Modal close
	}
	);
  }); // end of document ready
})(jQuery); // end of jQuery name space