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
    window.addEventListener("scroll", handleNavScroll, { passive: true });
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

    // ── 12. PUBLIC INITIALIZATION MODAL ORDER (Laravel Sync) ──────────
    const publicOrderModal = document.getElementById("publicOrderModal");
    const closePublicModal = document.getElementById("closePublicModal");
    const btnCancelPublicModal = document.getElementById(
        "btnCancelPublicModal",
    );
    const publicOrderForm = document.getElementById("publicOrderForm");

    const modalPriceId = document.getElementById("modalPriceId");
    const modalServiceName = document.getElementById("modalServiceName");

    document.querySelectorAll(".order-trigger").forEach((button) => {
        button.addEventListener("click", () => {
            const priceId = button.dataset.priceId;
            const serviceName = button.dataset.serviceName;

            modalPriceId.value = priceId;
            modalServiceName.value = serviceName;

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

    // PERBAIKAN FATAL: Mengizinkan form melakukan POST asli ke tab baru Laravel,
    // lalu langsung menutup modal secara otomatis di tab utama website.
    if (publicOrderForm) {
        publicOrderForm.addEventListener("submit", () => {
            // Menunda penutupan modal selama 300ms agar data form sempat terkirim penuh ke server
            setTimeout(() => {
                hidePublicModal();
            }, 300);
        });
    }

    // ── 13. THEME TOGGLE (Wedding) ──────────────────────────────────────
    const themeBtn = document.getElementById("themeToggleBtn");
    const themeBox = document.getElementById("themeContent");

    if (themeBtn && themeBox) {
        themeBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            themeBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const birthdayBtn = document.getElementById("birthdayToggleBtn");
    const birthdayBox = document.getElementById("birthdayContent");
    if (birthdayBtn && birthdayBox) {
        birthdayBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            birthdayBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const umumBtn = document.getElementById("umumToggleBtn");
    const umumBox = document.getElementById("umumContent");
    if (umumBtn && umumBox) {
        umumBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            umumBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const xmasBtn = document.getElementById("xmasToggleBtn");
    const xmasBox = document.getElementById("xmasContent");
    if (xmasBtn && xmasBox) {
        xmasBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            xmasBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const aqiqahBtn = document.getElementById("aqiqahToggleBtn");
    const aqiqahBox = document.getElementById("aqiqahContent");
    if (aqiqahBtn && aqiqahBox) {
        aqiqahBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            aqiqahBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const syukuranBtn = document.getElementById("syukuranToggleBtn");
    const syukuranBox = document.getElementById("syukuranContent");
    if (syukuranBtn && syukuranBox) {
        syukuranBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            syukuranBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const khitanBtn = document.getElementById("khitanToggleBtn");
    const khitanBox = document.getElementById("khitanContent");
    if (khitanBtn && khitanBox) {
        khitanBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            khitanBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const partyBtn = document.getElementById("partyToggleBtn");
    const partyBox = document.getElementById("partyContent");
    if (partyBtn && partyBox) {
        partyBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            partyBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }

    const schoolBtn = document.getElementById("schoolToggleBtn");
    const schoolBox = document.getElementById("schoolContent");
    if (schoolBtn && schoolBox) {
        schoolBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            schoolBox.classList.toggle("open");
            const icon = this.querySelector(".toggle-icon");
            if (icon) icon.classList.toggle("open");
        });
    }
});
