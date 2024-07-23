// import gsap from "gsap";
import { max767, min1024 } from "../utils";
export default class Header {
    constructor({ header, htmlBody }) {
        this.header = header;
        this.htmlBody = htmlBody;
        this.menuTrigger = this.header.find(".menu");
        this.megaMenu = this.htmlBody.find(".mega-menu");
        this.menuMask = this.htmlBody.find(".menu-mask");
        this.menuOverlay = this.htmlBody.find(".menu-overlay");
        this.megaMenuLinks = this.megaMenu.find("a");
        this.searchBox = $(".searchbox");
        this.bindEvents();
    }

    bindEvents = () => {
        const $container = this.htmlBody;

        $(".menu").on("click", (e) => this.handleMenu(e));
        // $container.on("click", ".menu", this.handleMenu);

        $(document).click((event) => {
            // Check if the clicked element is not the div or the button, and not a descendant of the div
            if (
                !this.megaMenu.is(event.target) &&
                (!this.searchBox.is(event.target) ||
                    this.searchBox.has(event.target).length) &&
                !this.menuTrigger.is(event.target) &&
                this.megaMenu.has(event.target).length === 0
            ) {
                if (this.menuTrigger.hasClass("active")) {
                    this.menuTrigger.trigger("click");
                }
            }
        });

        $(".searchbox").on("click", function (event) {
            event.stopPropagation();
        });

        $(".searchbox .icon-search").on("click", function () {
            $(".searchbox").addClass("open");
            $(".searchbox input").focus();
        });

        document.addEventListener("click", function (event) {
            if ($(".searchbox.open").length) {
                var isClickInside = $(".searchbox.open")[0].contains(event.target);

                // Check if the click is outside the target div
                if (!isClickInside) {
                    $(".searchbox").removeClass("open");
                }
            }
        });

        $(".close").on("click", function () {
            $(".searchbox").removeClass("open");
        });
    };

    handleMenuHoverEffects = () => {
        // TODO: Clean code
        this.megaMenu.find("nav").on("mousemove", (e) => {
            const mouseX = e.clientX;
            const mouseY = e.clientY;
            gsap.to(".img-wrap", {
                x: mouseX,
                y: mouseY,
                xPercent: -50,
                yPercent: -125,
                stagger: 0.05,
            });
        });

        gsap.utils.toArray(".nav-links p").forEach((link) => {
            let { label } = link.dataset;
            let img = $(`.img-wrap[data-image=${label}]`);
            let navLink = $(`.nav-links p[data-label=${label}]`);

            link.querySelector("a").addEventListener("mouseenter", () => {
                gsap.to(img[0], {
                    duration: 0.8,
                    opacity: 1,
                    ease: "Expo.easeOut",
                    startAt: { clipPath: "inset(30% 30% 30% 30%)" },
                    clipPath: "inset(0% 0% 0% 0%)",
                });
                gsap.set(img[0], { zIndex: 1 });
                gsap.set(navLink[0], { zIndex: 2 });
            });

            link.querySelector("a").addEventListener("mouseleave", () => {
                gsap.to(img[0], {
                    duration: 0.8,
                    opacity: 0,
                    ease: "Power3.easeOut",
                    zIndex: -1,
                    startAt: { clipPath: "inset(0% 0% 0% 0%)" },
                    clipPath: "inset(30% 30% 30% 30%)",
                });
                gsap.set(navLink[0], { zIndex: 0 });
            });
        });
    };

    handleMenu = (e) => {
        e.stopImmediatePropagation();
        min1024.matches && this.handleMenuHoverEffects();
        if (this.menuTrigger.hasClass("active")) {
            this.menuTrigger.removeClass("active");
            this.megaMenu.removeClass("active");
            this.menuMask.removeClass("active");
            this.menuOverlay.removeClass("active");

            this.megaMenu.slideUp("slow");
            this.htmlBody.removeClass("active");
            // if(this.header.hasClass('sticky')) {
            this.header.removeClass("sticky-active");
            // }
            lenis && lenis.start();
            this.header.removeClass("active");
        } else {
            this.menuTrigger.addClass("active");
            this.megaMenu.addClass("active");
            this.menuMask.addClass("active");
            this.header.addClass("active");
            this.menuOverlay.addClass("active");
            gsap.to(this.megaMenu[0], 0.8, { display: "block", ease: "power3.out" });

            this.megaMenu.slideDown("slow");
            this.htmlBody.addClass("active");
            if (this.header.hasClass("sticky")) {
                this.header.addClass("sticky-active");
            }
            lenis && lenis.stop();
        }
    };
}
