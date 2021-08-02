/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
(function ($) {
  'use strict'

  var $sidebar   = $('.control-sidebar')
  var $container = $('<div />', {
    class: 'p-3 control-sidebar-content'
  })

  $sidebar.append($container)

  var navbar_dark_skins = [
    'navbar-primary',
    'navbar-secondary',
    'navbar-info',
    'navbar-success',
    'navbar-danger',
    'navbar-indigo',
    'navbar-purple',
    'navbar-pink',
    'navbar-teal',
    'navbar-cyan',
    'navbar-dark',
    'navbar-gray-dark',
    'navbar-gray',
  ]

  var navbar_light_skins = [
    'navbar-light',
    'navbar-warning',
    'navbar-white',
    'navbar-orange',
  ]


  var $no_border_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.main-header').hasClass('border-bottom-0'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('border-bottom-0')
    } else {
      $('.main-header').removeClass('border-bottom-0')
    }
  })





  // $container.append(createSkinBlock(sidebar_colors, function () {
  //   var color         = $(this).data('color')
  //   var sidebar_class = 'sidebar-light-' + color.replace('bg-', '')
  //   var $sidebar      = $('.main-sidebar')
  //   sidebar_skins.map(function (skin) {
  //     $sidebar.removeClass(skin)
  //   })

  //   $sidebar.addClass(sidebar_class)
  // }))

  // var logo_skins = navbar_all_colors
  // $container.append('<h6>Brand Logo Variants</h6>')
  // var $logo_variants = $('<div />', {
  //   'class': 'd-flex'
  // })
  // $container.append($logo_variants)
  // var $clear_btn = $('<a />', {
  //   href: 'javascript:void(0)'
  // }).text('clear').on('click', function () {
  //   var $logo = $('.brand-link')
  //   logo_skins.map(function (skin) {
  //     $logo.removeClass(skin)
  //   })
  // })
  // $container.append(createSkinBlock(logo_skins, function () {
  //   var color = $(this).data('color')
  //   var $logo = $('.brand-link')
  //   logo_skins.map(function (skin) {
  //     $logo.removeClass(skin)
  //   })
  //   $logo.addClass(color)
  // }).append($clear_btn))

  // function createSkinBlock(colors, callback) {
  //   var $block = $('<div />', {
  //     'class': 'd-flex flex-wrap mb-3'
  //   })

  //   colors.map(function (color) {
  //     var $color = $('<div />', {
  //       'class': (typeof color === 'object' ? color.join(' ') : color).replace('navbar-', 'bg-').replace('accent-', 'bg-') + ' elevation-2'
  //     })

  //     $block.append($color)

  //     $color.data('color', color)

  //     $color.css({
  //       width       : '40px',
  //       height      : '20px',
  //       borderRadius: '25px',
  //       marginRight : 10,
  //       marginBottom: 10,
  //       opacity     : 0.8,
  //       cursor      : 'pointer'
  //     })

  //     $color.hover(function () {
  //       $(this).css({ opacity: 1 }).removeClass('elevation-2').addClass('elevation-4')
  //     }, function () {
  //       $(this).css({ opacity: 0.8 }).removeClass('elevation-4').addClass('elevation-2')
  //     })

  //     if (callback) {
  //       $color.on('click', callback)
  //     }
  //   })

  //   return $block
  // }
})(jQuery)
