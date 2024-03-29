!function (e) {
    "use strict";
    var a = e(window);
    a.on("load", function () {
        var t = e(document), n = e("html, body"), o = e(".loader-container"),
            s = e(".main-menu-content .dropdown-menu-item"), i = e(".user-chosen-select"), l = e(".counter"),
            r = e(".user-text-editor"), c = e("#back-to-top"), d = e(".card-carousel"), p = e(".card-carousel-2"),
            m = e(".card-carousel-3"), h = e(".client-logo"), u = e(".testimonial-carousel"),
            g = e(".gallery-carousel"), v = e(".date-dropper-input"), f = e(".full-screen-slider"),
            w = e(".online-user-slider"), y = e(".emoji-picker"), b = e("#sticky-content-nav .scroll-link"),
            C = e(".single-slider"), k = e(".js-tilt"), x = e(".js-tilt-2"), T = e(".lazy");

        function S(a) {
            e(a).each(function () {
                var a = e(this).attr("data-rating");
                a >= 4 ? (e(this).addClass("high"), e(this).find(".review-bars-review-inner").css({width: a / 5 * 100 + "%"})) : a >= 3 ? (e(this).addClass("mid"), e(this).find(".review-bars-review-inner").css({width: a / 5 * 80 + "%"})) : a < 3 && (e(this).addClass("low"), e(this).find(".review-bars-review-inner").css({width: a / 5 * 60 + "%"}))
            })
        }

        o.delay("500").fadeOut(2e3), t.on("click", "#sidebarToggleTop", function () {
            e(".dashboard-sidebar").addClass("sidebar-is-active")
        }), t.on("click", "#sidebar-close", function () {
            e(".dashboard-sidebar").removeClass("sidebar-is-active")
        }), t.on("click", ".menu-toggle", function () {
            e(this).toggleClass("active"), e(".main-menu-content").slideToggle(200)
        }), s.parent("li").children("a").append(function () {
            return '<span class="drop-menu-toggle"><i class="la la-plus"></i></span>'
        }), t.on("click", ".drop-menu-toggle", function () {
            var a = e(this);
            return a.toggleClass("active"), a.parent().parent().children(".dropdown-menu-item").toggle(), !1
        }), a.on("resize", function () {
            a.width() > 1200 ? (e(".main-menu-content").show(), e(".dropdown-menu-item").show()) : (e(".main-menu-content").hide(), e(".dropdown-menu-item").hide())
        }), t.on("click", ".header-search", function () {
            // e(this).toggleClass("active")
        }), t.on("click", function (a) {
            // var t = e(".header-search");
            // t === a.target || t.has(a.target).length || e(".header-search").removeClass("active")
        }), a.on("scroll", function () {
            a.scrollTop() > 10 ? (e(".header-menu-wrapper").addClass("header-fixed"), e(".header-top-bar").hide(200)) : (e(".header-menu-wrapper").removeClass("header-fixed"), e(".header-top-bar").show(200)), a.scrollTop() > 300 ? e(c).addClass("btn-active") : e(c).removeClass("btn-active"), e(".page-scroll").each(function () {
                e(this).offset().top - e(window).scrollTop() < 20 && (b.removeClass("active"), e("#sticky-content-nav").find('[data-scroll="' + e(this).attr("id") + '"]').addClass("active"))
            })
        }), t.on("click", "#back-to-top", function () {
            return e(n).animate({scrollTop: 0}, 800), !1
        }), e(d).length && e(d).owlCarousel({
            loop: !0,
            items: 3,
            nav: !0,
            dots: !0,
            smartSpeed: 700,
            autoplay: !1,
            center: !0,
            margin: 30,
            navText: ['<i class="la la-arrow-left"></i>', '<i class="la la-arrow-right"></i>'],
            responsive: {0: {items: 1}, 992: {items: 3}}
        }), e(p).length && e(p).owlCarousel({
            loop: !0,
            items: 4,
            nav: !1,
            dots: !0,
            smartSpeed: 700,
            autoplay: !1,
            margin: 30,
            responsive: {0: {items: 1}, 600: {items: 3}, 1200: {items: 4}}
        }), e(m).length && e(m).owlCarousel({
            loop: !0,
            items: 2,
            nav: !1,
            dots: !0,
            smartSpeed: 700,
            autoplay: !1,
            margin: 30,
            responsive: {0: {items: 1}, 600: {items: 2}}
        }), e(h).length && e(h).owlCarousel({
            loop: !0,
            items: 6,
            nav: !1,
            dots: !1,
            smartSpeed: 700,
            autoplay: !0,
            responsive: {0: {items: 1}, 425: {items: 2}, 480: {items: 2}, 767: {items: 4}, 992: {items: 6}}
        }), e(u).length && e(u).owlCarousel({
            loop: !0,
            items: 3,
            center: !0,
            nav: !0,
            dots: !0,
            smartSpeed: 700,
            autoplay: !1,
            margin: 10,
            navText: ['<i class="la la-arrow-left"></i>', '<i class="la la-arrow-right"></i>'],
            responsive: {0: {items: 1}, 768: {items: 2}, 992: {items: 3}}
        }), e(g).length && e(g).owlCarousel({
            loop: !0,
            items: 1,
            nav: !0,
            dots: !0,
            smartSpeed: 700,
            autoplay: !1,
            dotsData: !0,
            navText: ['<span class="la la-chevron-left"></span>', '<span class="la la-chevron-right"></span>']
        }), e(v).length && e(v).dateDropper(), e(f).length && e(f).owlCarousel({
            loop: !1,
            items: 4,
            nav: !0,
            dots: !1,
            smartSpeed: 700,
            autoplay: !1,
            margin: 5,
            navText: ['<span class="la la-arrow-left"></span>', '<span class="la la-arrow-right"></span>'],
            responsive: {0: {items: 1, autoplay: !0}, 768: {items: 2, autoplay: !0}, 992: {items: 4}}
        }), e(w).length && e(w).owlCarousel({
            loop: !1,
            items: 4,
            nav: !0,
            dots: !1,
            smartSpeed: 700,
            autoplay: !1,
            margin: 5,
            navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>']
        }), e(C).length && e(C).owlCarousel({
            loop: !0,
            items: 1,
            nav: !0,
            dots: !0,
            smartSpeed: 700,
            autoplay: !1,
            navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>']
        }), e(".qtyDec, .qtyInc").on("click", function () {
            var a = e(this), t = a.parent().find('input[type="text"]').val();
            if (a.hasClass("qtyInc")) var n = parseFloat(t) + 1; else if (t > 0) n = parseFloat(t) - 1; else n = 0;
            a.parent().find('input[type="text"]').val(n)
        }), e(i).length && e(i).chosen({
            no_results_text: "Oops, nothing found!",
            allow_single_deselect: !0
        }), e(i).on("chosen:showing_dropdown", function (a, t) {
            var n = e(a.target).next(".chosen-container"), o = n.find(".chosen-drop");
            o.offset().top - e(window).scrollTop() + o.height() > e(window).height() && n.addClass("chosen-drop-up")
        }), e(i).on("chosen:hiding_dropdown", function (a, t) {
            e(a.target).next(".chosen-container").removeClass("chosen-drop-up")
        }), e(l).length && e(l).counterUp({
            delay: 10,
            time: 1e3
        }), e(r).length && e(r).jqte({
            placeholder: "Detail description about of your listing",
            formats: [["p", "Paragraph"], ["h1", "Heading 1"], ["h2", "Heading 2"], ["h3", "Heading 3"], ["h4", "Heading 4"], ["h5", "Heading 5"], ["h6", "Heading 6"], ["pre", "Preformatted"]]
        }), t.on("click", ".open-filter-btn", function (a) {
            a.preventDefault(), e(this).toggleClass("active")
        }), e(k).length && e(k).tilt({maxTilt: 1}), e(x).length && e(x).tilt({maxTilt: 4}), e("[data-fancybox]").fancybox(), e(y).length && e(y).emojioneArea({pickerPosition: "top"}), e('[data-toggle="tooltip"]').tooltip(), e("#slider-range").slider({
            range: !0,
            min: 0,
            max: 500,
            values: [50, 290],
            slide: function (a, t) {
                e("#amount").val("$" + t.values[0] + " - $" + t.values[1])
            }
        }), e("#amount").val("$" + e("#slider-range").slider("values", 0) + " - $" + e("#slider-range").slider("values", 1)), t.on("click", ".bookmark-btn", function () {
            e(this).toggleClass("active")
        }), t.on("click", ".login-btn", function () {
            e(".login-form").modal("show"), e(".signup-form, .message-form").modal("hide")
        }), t.on("click", ".signup-btn", function () {
            e(".login-form, .recover-form").modal("hide"), e(".signup-form").modal("show")
        }), t.on("click", ".lost-pass-btn", function () {
            e(".login-form").modal("hide"), e(".recover-form").modal("show")
        }),S(".review-bars-review"), e(window).on("resize", function () {
            S(".review-bars-review")
        });
        // e("#map").length && initMap("map", 40.717499, -74.044113, "images/map-marker.png"), S(".review-bars-review"), e(window).on("resize", function () {
        //     S(".review-bars-review")
        // });
        for (var j = document.querySelectorAll(".payment-tab-toggle > input"), q = 0; q < j.length; q++) j[q].addEventListener("change", D);

        function D(e) {
            for (var a = document.querySelectorAll(".payment-tab"), t = 0; t < a.length; t++) a[t].classList.remove("is-active");
            e.target.parentNode.parentNode.classList.add("is-active")
        }

        b.on("click", function (a) {
            var t = e(e(this).attr("href"));
            e(n).animate({scrollTop: t.offset().top}, 600), e(this).addClass("active"), a.preventDefault()
        }), e(T).length && e(T).Lazy()
    })
}(jQuery);
