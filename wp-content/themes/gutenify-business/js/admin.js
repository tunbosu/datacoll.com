"use strict";

var _wp = wp,
    apiFetch = _wp.apiFetch;
jQuery(function ($) {
  var gutenify_businessRedirectToKitPage = function gutenify_businessRedirectToKitPage(res) {
    // if( res?.status && 'active' === res.status ) {
    window.location = "".concat(window.gutenify_business.gutenify_kit_gallery); // }
  }; // Activate Gutenify.


  $(document).on('click', '.gutenify-business-activate-gutenify', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('gutenify-business-importing-gutenify');
    apiFetch({
      path: '/wp/v2/plugins/gutenify/gutenify',
      method: 'POST',
      data: {
        "status": "active"
      }
    }).then(function (res) {
      gutenify_businessRedirectToKitPage(res);
    })["catch"](function () {
      gutenify_businessRedirectToKitPage({});
    });
  });
  $(document).on('click', '.gutenify-business-install-gutenify', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('gutenify-business-importing-gutenify');
    apiFetch({
      path: '/wp/v2/plugins',
      method: 'POST',
      data: {
        "slug": "gutenify",
        "status": "active"
      }
    }).then(function (res) {
      gutenify_businessRedirectToKitPage(res);
    })["catch"](function () {
      gutenify_businessRedirectToKitPage({});
    });
  });
  $(document).on('click', '.gutenify-business-admin-notice .notice-dismiss', function () {
    console.log(ajaxurl + "?action=gutenify_business_hide_theme_info_noticebar");
    apiFetch({
      url: ajaxurl + "?action=gutenify_business_hide_theme_info_noticebar&gutenify_business-nonce-name=".concat(window.gutenify_business.gutenify_business_nonce),
      method: 'POST'
    }).then(function (res) {
      console.log(res);
    })["catch"](function (res) {
      console.log(res);
    });
  });
});