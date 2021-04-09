// import Swiper JS
import Swiper from 'swiper/swiper-bundle';

// import Swiper styles
import 'swiper/swiper-bundle.min.css';

// ローディング判定
jQuery(window).on("load", function () {
  jQuery("body").attr("data-loading", "true");
});

jQuery(function () {
  // スクロール判定
  jQuery(window).on("scroll", function () {
    let scrollTop = jQuery(this).scrollTop();
    let windowHeight = jQuery(this).height();
    let documentHeight = jQuery(document).height();

    if (100 < scrollTop) {
      jQuery("body").attr("data-scroll", "true");
    } else {
      jQuery("body").attr("data-scroll", "false");
    }

    if (documentHeight - (windowHeight + scrollTop) <= 0) {
      jQuery("body").attr("data-scroll-bottom", "true");
    } else {
      jQuery("body").attr("data-scroll-bottom", "false");
    }

    if (1000 < scrollTop) {
      jQuery('.js-totop').addClass('is-active');
    } else {
      jQuery('.js-totop').removeClass('is-active');
    }
  });


  /* ドロワー */
  jQuery(".js-drawer").on("click", function (event) {
    event.preventDefault();
    const targetClass = jQuery(this).attr("data-target");
    const ariaControls = jQuery(this).attr("aria-controls");
    const addClass = 'is-opened'

    // targetのクラス名をトグル
    jQuery(`.${targetClass}`).toggleClass(addClass);

    // 制御対象のaria-hidden属性を操作
    jQuery(`#${ariaControls}`).attr("aria-hidden", (jQuery(`#${ariaControls}`).hasClass(addClass) ? 'false' : 'true'));

    // 同じ制御対象を持つ要素全てに対して制御対象の状態に応じてaria-expanded属性を操作
    jQuery(`[aria-controls=${ariaControls}]`).each(function () {
      jQuery(this).attr("aria-expanded", (jQuery(`#${ariaControls}`).hasClass(addClass) ? 'false' : 'true'));
    });

    // ドロワー開時にbody要素がスクロールしないように
    (jQuery(`.${targetClass}`).hasClass(addClass) ? jQuery('body').addClass('u-overflowHidden') : jQuery('body').removeClass('u-overflowHidden'));
    (jQuery(`.${targetClass}`).hasClass(addClass) ? jQuery('.p-header__logo').addClass('drawer-opened') : jQuery('.p-header__logo').removeClass('drawer-opened'));

    return false;
  });

  /* スムーススクロール */
  jQuery('a[href^="#"]').click(function () {
    let header = jQuery("#header").height();
    let speed = 300;
    let id = jQuery(this).attr("href");
    let target = jQuery("#" == id ? "html" : id);
    let position = target.offset().top - header;
    jQuery(this).blur();
    if ("fixed" !== jQuery("#header").css("position")) {
      position = target.offset().top;
    }
    if (0 > position) {
      position = 0;
    }
    jQuery("html, body").animate(
      {
        scrollTop: position
      },
      speed
    );

    return false;
  });

  // accordion を閉じておく
  /* jQueryが動作しなかった場合のためにCSSではdisplay none をせずにjqueryで閉じる */
  jQuery('.js-accordion > a').each(function (index, element) {
    jQuery(this).nextAll('.sub-menu').hide();
    jQuery(this).parent().addClass('is-closed');
  });
  // accordion
  jQuery('.js-accordion > a').on('click', function (event) {
    event.preventDefault();
    jQuery(this).nextAll('.sub-menu').slideToggle();
    jQuery(this).parent().toggleClass('is-closed');
    return false;
  });

  /* 電話リンク */
  let ua = navigator.userAgent;
  if (ua.indexOf("iPhone") < 0 && ua.indexOf("Android") < 0) {
    jQuery('a[href^="tel:"]')
      .css("cursor", "default")
      .on("click", function (e) {
        e.preventDefault();
      });
  }

  /* formの入力確認 */
  let $submit = jQuery('#js-submit');
  jQuery('#js-form input, #js-form textarea').on('keyup', function () {
    if (
      jQuery('#js-form input[name="name"]').val() !== "" &&
      jQuery('#js-form input[type="email"]').val() !== "" &&
      jQuery('#js-form textarea').val() !== ""
    ) {
      // すべて入力されたとき
      $submit.prop('disabled', false);
    } else {
      // 入力されていないとき
      $submit.prop('disabled', true);
    }
  });

  // form validation
  (function () {
    var requireFlg = false;
    var privacyFlg = false;
    var $require = jQuery('#js-form .js-require');
    var fillCount = 0;

    function setSubmitProp() {
      if (requireFlg && privacyFlg) {
        jQuery('#js-submit').prop('disabled', false);
      } else {
        jQuery('#js-submit').prop('disabled', true);
      }
    }

    // 必須項目
    $require.on('blur', function () {
      if (jQuery(this).attr('id') === 'js-formKana' && !jQuery(this).val().match(/^([ァ-ン]|ー)+$/)) {
        jQuery(this).val('');
        alert('全角カタカナで入力してください。')
      }

      $require.each(function () {
        var value = jQuery(this).val();

        if ((value !== '' && value.match(/[^\s\t]/))) {
          fillCount++;
        }
      });

      requireFlg = (fillCount === $require.length ? true : false);

      setSubmitProp();
      fillCount = 0;
    });

    // プライバシーポリシー
    jQuery('#form-privacy').on('change', function () {
      privacyFlg = (jQuery(this).prop('checked') ? true : false);
      setSubmitProp();
    });

    // 送信時
    jQuery('#js-form').on('submit', function () {
      if (!(requireFlg && privacyFlg)) {
        alert('入力に誤りがあります。');
        return false;
      }
    });
  })();

  /* slider */
  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: true
    },
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });
});
