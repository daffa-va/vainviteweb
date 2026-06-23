/* ============================================
   VA DESIGN — script.js (Laravel Integrated)
   ============================================ */

document.addEventListener("DOMContentLoaded", () => {
    // ── 1. NAVBAR: scroll behavior ──────────────────────────────────
    const navbar = document.getElementById("navbar");

    const handleNavScroll = () => {
        if (window.scrollY > 40) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    };
    let ticking = false;
    window.addEventListener("scroll", () => {
        if (!ticking) {
            requestAnimationFrame(() => { handleNavScroll(); ticking = false; });
            ticking = true;
        }
    }, { passive: true });
    handleNavScroll();

    // ── 2. MOBILE HAMBURGER ─────────────────────────────────────────
    const hamburger = document.getElementById("hamburger");
    const navLinks = document.getElementById("navLinks");
    const navOverlay = document.getElementById("navOverlay");

    const closeMenu = () => {
        hamburger.classList.remove("open");
        navLinks.classList.remove("open");
        if (navOverlay) navOverlay.classList.remove("open");
        document.body.style.overflow = "";
    };

    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("open");
        navLinks.classList.toggle("open");
        if (navOverlay) navOverlay.classList.toggle("open");

        document.body.style.overflow = navLinks.classList.contains("open")
            ? "hidden"
            : "";
    });

    if (navOverlay) {
        navOverlay.addEventListener("click", closeMenu);
    }

    navLinks.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", closeMenu);
    });

    // ── 3. SCROLL REVEAL ────────────────────────────────────────────
    const revealEls = document.querySelectorAll(".reveal");

    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => {
                        entry.target.classList.add("visible");
                    }, Number(delay));
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: "0px 0px -40px 0px" },
    );

    revealEls.forEach((el) => revealObserver.observe(el));

    // ── 4. STAGGER CHILDREN on service/price/why cards ──────────────
    const staggerParents = document.querySelectorAll(
        ".services-grid, .pricing-grid, .why-grid",
    );

    staggerParents.forEach((parent) => {
        const children = parent.querySelectorAll(".reveal");
        children.forEach((child, i) => {
            child.dataset.delay = i * 90;
        });
    });

    // ── 5. ACTIVE NAV LINK on scroll ────────────────────────────────
    const sections = document.querySelectorAll("section[id]");
    const navAnchor = document.querySelectorAll(".nav-links a:not(.btn-nav)");

    const sectionObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute("id");
                    navAnchor.forEach((a) => {
                        a.style.color =
                            a.getAttribute("href") === `#${id}`
                                ? "var(--white)"
                                : "";
                    });
                }
            });
        },
        { threshold: 0.45 },
    );

    sections.forEach((s) => sectionObserver.observe(s));

    // ── 6. PRICE CARD TILT effect ────────────────────────────────────
    const tiltCards = document.querySelectorAll(
        ".price-card:not(.featured-card), .service-card, .why-card",
    );

    tiltCards.forEach((card) => {
        card.addEventListener("mousemove", (e) => {
            const rect = card.getBoundingClientRect();
            const cx = rect.left + rect.width / 2;
            const cy = rect.top + rect.height / 2;
            const dx = (e.clientX - cx) / (rect.width / 2);
            const dy = (e.clientY - cy) / (rect.height / 2);
            const tiltX = dy * -4;
            const tiltY = dx * 4;
            card.style.transform = `translateY(-5px) perspective(600px) rotateX(${tiltX}deg) rotateY(${tiltY}deg)`;
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "";
            card.style.transition = "transform 0.5s cubic-bezier(0.4,0,0.2,1)";
            setTimeout(() => {
                card.style.transition = "";
            }, 500);
        });
    });

    // ── 7. TICKER pause on hover ─────────────────────────────────────
    const ticker = document.querySelector(".ticker");
    if (ticker) {
        const wrap = ticker.closest(".ticker-wrap");
        wrap.addEventListener("mouseenter", () => {
            ticker.style.animationPlayState = "paused";
        });
        wrap.addEventListener("mouseleave", () => {
            ticker.style.animationPlayState = "running";
        });
    }

    // ── 8. CTA GLOW parallax ─────────────────────────────────────────
    const ctaBox = document.querySelector(".cta-box");
    const ctaGlow = document.querySelector(".cta-glow");

    if (ctaBox && ctaGlow) {
        cardX = 0; // Temp placeholder
        ctaBox.addEventListener("mousemove", (e) => {
            const rect = ctaBox.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            ctaGlow.style.background = `radial-gradient(ellipse at ${x}% ${y}%, rgba(255,255,255,0.06), transparent 65%)`;
        });
        ctaBox.addEventListener("mouseleave", () => {
            ctaGlow.style.background = "";
        });
    }

    // ── 9. SMOOTH SCROLL for all anchor links ─────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach((a) => {
        a.addEventListener("click", (e) => {
            const target = document.querySelector(a.getAttribute("href"));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    });

    // ── 10. HERO TITLE: character-by-character reveal ──────────────────
    const heroTitle = document.querySelector(".hero-title");
    if (heroTitle) {
        const lines = heroTitle.querySelectorAll(".line");
        lines.forEach((line, lineIdx) => {
            const text = line.textContent;
            line.textContent = "";
            line.style.overflow = "hidden";
            line.style.display = "block";

            const inner = document.createElement("span");
            inner.style.display = "block";
            inner.style.opacity = "0";
            inner.style.transform = "translateY(40px)";
            inner.style.transition = `opacity 0.6s ease ${lineIdx * 0.15 + 0.2}s, transform 0.6s ease ${lineIdx * 0.15 + 0.2}s`;
            inner.textContent = text;
            line.appendChild(inner);

            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    setTimeout(() => {
                        inner.style.opacity = "1";
                        inner.style.transform = "translateY(0)";
                    }, 100);
                });
            });
        });
    }

    // ── 11. COUNTER animation for hero stats ──────────────────────────
    const stats = document.querySelectorAll(".stat-num");

    const counterObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const raw = el.textContent.trim();

                const num = parseInt(raw.replace(/\D/g, ""), 10);
                if (isNaN(num) || raw === "∞") return;

                const suffix = raw.replace(/[0-9]/g, "");
                let start = 0;
                const dur = 1200;
                const step = 16;
                const inc = num / (dur / step);

                const timer = setInterval(() => {
                    start += inc;
                    if (start >= num) {
                        start = num;
                        clearInterval(timer);
                    }
                    el.textContent = Math.floor(start) + suffix;
                }, step);

                counterObserver.unobserve(el);
            });
        },
        { threshold: 0.5 },
    );

    stats.forEach((s) => counterObserver.observe(s));

    // ── 12. PUBLIC MODAL ORDER ────────────────────────────────────────
    const publicOrderModal = document.getElementById("publicOrderModal");
    const closePublicModal = document.getElementById("closePublicModal");
    const btnCancelPublicModal = document.getElementById("btnCancelPublicModal");
    const publicOrderForm = document.getElementById("publicOrderForm");

    const modalThemeCategory = document.getElementById("modalThemeCategory");
    const modalThemeName = document.getElementById("modalThemeName");
    const modalThemeSlug = document.getElementById("modalThemeSlug");
    const modalThemeLink = document.getElementById("modalThemeLink");
    const modalCategoryDisplay = document.getElementById("modalCategoryDisplay");
    const modalThemeDisplay = document.getElementById("modalThemeDisplay");

    document.querySelectorAll(".order-trigger").forEach((button) => {
        button.addEventListener("click", () => {
            const category = button.dataset.category;
            const themeName = button.dataset.themeName;
            const themeSlug = button.dataset.themeSlug;
            const themeLink = button.dataset.themeLink;

            modalThemeCategory.value = category;
            modalThemeName.value = themeName;
            modalThemeSlug.value = themeSlug;
            modalThemeLink.value = themeLink;
            modalCategoryDisplay.value = category;
            modalThemeDisplay.value = themeName;

            publicOrderModal.classList.add("show");
            document.body.style.overflow = "hidden";
        });
    });

    const hidePublicModal = () => {
        publicOrderModal.classList.remove("show");
        document.body.style.overflow = "";
        publicOrderForm.reset();
    };

    if (closePublicModal)
        closePublicModal.addEventListener("click", hidePublicModal);
    if (btnCancelPublicModal)
        btnCancelPublicModal.addEventListener("click", hidePublicModal);

    window.addEventListener("click", (e) => {
        if (e.target === publicOrderModal) {
            hidePublicModal();
        }
    });

    if (publicOrderForm) {
        publicOrderForm.addEventListener("submit", () => {
            setTimeout(() => {
                hidePublicModal();
            }, 300);
        });
    }

    // ── 13. CATALOG TABS + SEARCH ────────────────────────────────────
    var tabs = document.querySelectorAll(".catalog-tab");
    var panels = document.querySelectorAll(".catalog-panel");
    var searchInput = document.getElementById("catalogSearch");

    tabs.forEach(function(tab) {
        tab.addEventListener("click", function() {
            var isActive = this.classList.contains("active");
            tabs.forEach(function(t) { t.classList.remove("active"); });
            panels.forEach(function(p) { p.classList.remove("active"); });
            if (!isActive) {
                this.classList.add("active");
                var target = document.getElementById("panel-" + this.getAttribute("data-tab"));
                if (target) {
                    target.classList.add("active");
                    if (searchInput && searchInput.value.trim() !== "") {
                        filterThemes(searchInput.value.trim());
                    }
                }
            }
        });
    });

    function filterThemes(q) {
        var allPanels = document.querySelectorAll(".catalog-panel");
        allPanels.forEach(function(panel) {
            var items = panel.querySelectorAll(".theme-item");
            var hasVisible = false;
            items.forEach(function(item) {
                var label = item.querySelector(".theme-label");
                var name = label ? label.textContent.toLowerCase() : "";
                var match = name.indexOf(q.toLowerCase()) !== -1;
                item.style.display = match ? "block" : "none";
                if (match) hasVisible = true;
            });
            // only show panels with visible items (or if no search)
            if (q !== "") {
                if (!panel.classList.contains("active")) return;
                var grid = panel.querySelector(".theme-grid");
                if (grid) {
                    grid.style.display = hasVisible ? "grid" : "none";
                }
                var msg = panel.querySelector(".search-empty");
                if (hasVisible) {
                    if (msg) msg.remove();
                } else {
                    if (!msg) {
                        msg = document.createElement("p");
                        msg.className = "search-empty";
                        msg.textContent = "Tidak ada tema yang cocok";
                        panel.appendChild(msg);
                    }
                }
            } else {
                items.forEach(function(item) { item.style.display = "block"; });
                var grid = panel.querySelector(".theme-grid");
                if (grid) grid.style.display = "grid";
                var msg = panel.querySelector(".search-empty");
                if (msg) msg.remove();
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener("input", function() {
            filterThemes(this.value.trim());
        });
    }

    // ── 14. FAQ ACCORDION ──────────────────────────────────────────────
    document.querySelectorAll(".faq-question").forEach(function(btn) {
        btn.addEventListener("click", function() {
            var item = this.closest(".faq-item");
            var isOpen = item.classList.contains("open");
            document.querySelectorAll(".faq-item.open").forEach(function(i) {
                i.classList.remove("open");
            });
            if (!isOpen) {
                item.classList.add("open");
            }
        });
    });
});
