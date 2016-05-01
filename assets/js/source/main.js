(function() {
	// MENU
	var mainNavigation = $(".main-navigation");
	var toggleMenu = function() {
		// toggle class open
		mainNavigation.toggleClass("open");
	};

	// OVERLAY
	var toggleOverlay = function() {
		var overlay = $(".overlay"),
		    submenu = $(".submenu");
		if (parseInt($(window).width()) > 768) {
			if (!submenu.hasClass("open") && overlay.hasClass("open")){
				overlay.removeClass("open");
				overlay.fadeOut();
			} else if (
				submenu.hasClass("open") &&
				overlay.hasClass("open") &&
				$(this).hasClass("overlay")
			) {
				overlay.removeClass("open");
				overlay.fadeOut();
			} else {
				overlay.addClass("open");
				overlay.fadeIn();
			}
		} else {
			overlay.toggleClass("open");
			overlay.fadeToggle();
		}

    // Prevent Scroll if overlay is open
    var scrollTop;
    if (overlay.hasClass("open")) {
      // Check if height is bigger than window
      if ($(document).height() > $(window).height()) {
        // Fix for Chrome, Firefox, IE...
        scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop();
        // Only reset scroll position if the overlay is not open
        if (!$('html').hasClass("noscroll")){
          $('html').addClass('noscroll').css('top',-scrollTop);
        }
      }
    } else {
      scrollTop = parseInt($('html').css('top'));
      $('html').removeClass('noscroll');
      $('html,body').scrollTop(-scrollTop);
    }
	};

	// SUBMENU
	var openSubmenu = function() {
		var header = $(".header"),
		    menuItem = $(".main-navigation__item"),
		    submenu = $(".submenu"),
		    headerNavigation = $(".header-navigation"),
        submenuName;

		// Get all classes of the current menu item
		var classesList = this.className.split(/\s+/);
		// Iterate all classes
    for (var i = 0; i < classesList.length; i++){
      // Check if there is a class with "main-navigation__item--"
      if (classesList[i].indexOf("main-navigation__item--") !== -1) {
        // Remove "main-navigation__item--" from the string
        submenuName = classesList[i].replace('main-navigation__item--','');
      }
    }

		// Submenu Selector
		var submenuSelector = ".submenu--" + submenuName;

		if ($(this).hasClass("active")){
			$(this).removeClass('active');
			menuItem.removeClass('active');
			$(submenuSelector).removeClass("open");
			submenu.removeClass('open');
		} else {
			// Add active class to menu item
			menuItem.removeClass('active');
			$(this).addClass("active");
			submenu.removeClass('open');
			// Add open class to submenu
			$(submenuSelector).addClass("open");
		}
	};

  // Extend header height when submenu is open
	var extendHeader = function() {
		var headerNavigation = $(".header-navigation");
		var submenu = $(".submenu");
		var mainNavigation = $(".main-navigation");
		// add open class to header navigation to expand background
		if (!headerNavigation.hasClass("open")) {
      headerNavigation.animate({
        height: 360,
      }, 200);
			headerNavigation.addClass("open");
		} else if (!submenu.hasClass("open")) {
      headerNavigation.animate({
        height: 63,
      }, 200);
			headerNavigation.removeClass("open");
		}
	};

	$(document).ready(function() {

		// $('img').delay(200).fadeTo(800, 1);

    // Mobile menu
		$(".menu-icon")
			.bind('click', toggleMenu)
			.bind('click', toggleOverlay);
    // Overlay layer
		$(".overlay")
			.bind('click', toggleMenu)
			.bind('click', openSubmenu)
			.bind('click', toggleOverlay);
    // Submeus interactions
		$(".main-navigation__item")
			.bind('click', openSubmenu);


    if (parseInt($(window).width()) > 768) {
			$(".overlay").bind('click', extendHeader);
      // Submenu interaction if the screen is bigger than 768px
  		$(".main-navigation__item").click(function() {
  				toggleOverlay();
  				extendHeader();
  		});
      $(".header").hover(function(){
        $(this).toggleClass("on-hover");
      });
      $(".overlay").hover(function(){
        $(".header").toggleClass("on-hover");
      });
    }

    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= 2) {
        $(".header").addClass("scrolling");
      } else if (scroll <= 2) {
        $(".header").removeClass("scrolling");
      }
      if (scroll + $(window).height() > $(document).height() - 100) {
        $(".header").addClass("on-hover");
        $(".header").removeClass("scrolling");
      } else {
        $(".header").removeClass("on-hover");
      }
    });
	});
})();
