(() => {
  "use strict";

  const announcement = document.querySelector("[data-announcement]");
  if (
    announcement &&
    sessionStorage.getItem("estatein-announcement") === "dismissed"
  ) {
    announcement.hidden = true;
  }
  document
    .querySelector("[data-announcement-close]")
    ?.addEventListener("click", () => {
      announcement.hidden = true;
      sessionStorage.setItem("estatein-announcement", "dismissed");
    });

  const toggle = document.querySelector("[data-menu-toggle]");
  const menu = document.querySelector("[data-menu]");
  const closeMenu = (returnFocus = false) => {
    if (!toggle || !menu) return;
    toggle.setAttribute("aria-expanded", "false");
    menu.classList.remove("is-open");
    document.body.classList.remove("menu-open");
    if (returnFocus) toggle.focus();
  };
  toggle?.addEventListener("click", () => {
    const open = toggle.getAttribute("aria-expanded") !== "true";
    toggle.setAttribute("aria-expanded", String(open));
    menu.classList.toggle("is-open", open);
    document.body.classList.toggle("menu-open", open);
    if (open) menu.querySelector("a")?.focus();
  });
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && menu?.classList.contains("is-open"))
      closeMenu(true);
  });
  document.addEventListener("click", (event) => {
    if (
      menu?.classList.contains("is-open") &&
      !menu.contains(event.target) &&
      !toggle.contains(event.target)
    )
      closeMenu();
  });

  document.querySelectorAll("[data-carousel]").forEach((carousel) => {
    const track = carousel.querySelector("[data-carousel-track]");
    const cards = [...track.children];
    const root = carousel.closest(".clients");
    const current = root.querySelector("[data-carousel-current]");
    const prev = root.querySelector("[data-carousel-prev]");
    const next = root.querySelector("[data-carousel-next]");
    let index = 0;
    const visibleCount = () =>
      window.matchMedia("(min-width: 48rem)").matches ? 2 : 1;
    const update = () => {
      index = Math.max(0, Math.min(index, cards.length - visibleCount()));
      const card = cards[index];
      const offset = card.offsetLeft - cards[0].offsetLeft;
      track.style.transform = `translateX(-${offset}px)`;
      current.textContent = String(index + 1).padStart(2, "0");
      prev.disabled = index === 0;
      next.disabled = index >= cards.length - visibleCount();
    };
    prev.addEventListener("click", () => {
      index -= visibleCount();
      update();
    });
    next.addEventListener("click", () => {
      index += visibleCount();
      update();
    });
    carousel.addEventListener("keydown", (event) => {
      if (event.key === "ArrowLeft") {
        event.preventDefault();
        prev.click();
      }
      if (event.key === "ArrowRight") {
        event.preventDefault();
        next.click();
      }
    });
    window.addEventListener("resize", update, { passive: true });
    update();
  });

  document.querySelectorAll("[data-home-slider]").forEach((slider) => {
    const track = slider.querySelector("[data-home-track]");
    const section = slider.closest(".home-section");
    const cards = [...track.children];
    const current = section.querySelector("[data-home-current]");
    const prev = section.querySelector("[data-home-prev]");
    const next = section.querySelector("[data-home-next]");
    let index = 0;
    const visible = () =>
      window.matchMedia("(min-width: 48rem)").matches ? 3 : 1;
    const update = () => {
      index = Math.max(0, Math.min(index, cards.length - visible()));
      const offset = cards[index].offsetLeft - cards[0].offsetLeft;
      track.style.transform = `translateX(-${offset}px)`;
      current.textContent = String(index + 1).padStart(2, "0");
      prev.disabled = index === 0;
      next.disabled = index >= cards.length - visible();
    };
    prev.addEventListener("click", () => {
      index -= visible();
      update();
    });
    next.addEventListener("click", () => {
      index += visible();
      update();
    });
    window.addEventListener("resize", update, { passive: true });
    update();
  });

  document.querySelectorAll("[data-property-gallery]").forEach((gallery) => {
    const thumbs = [...gallery.querySelectorAll("[data-gallery-thumb]")];
    const stage = gallery.querySelector("[data-gallery-image]");
    const previous = gallery.querySelector("[data-gallery-prev]");
    const next = gallery.querySelector("[data-gallery-next]");
    let index = 0;
    const show = (nextIndex) => {
      index = (nextIndex + thumbs.length) % thumbs.length;
      thumbs.forEach((thumb, thumbIndex) => {
        const active = thumbIndex === index;
        thumb.classList.toggle("is-active", active);
        thumb.setAttribute("aria-pressed", String(active));
      });
      stage.src =
        thumbs[index].dataset.gallerySource || thumbs[index].currentSrc;
      stage.removeAttribute("srcset");
    };
    thumbs.forEach((thumb, thumbIndex) => {
      thumb.tabIndex = 0;
      thumb.addEventListener("click", () => show(thumbIndex));
      thumb.addEventListener("keydown", (event) => {
        if (event.key === "Enter" || event.key === " ") show(thumbIndex);
      });
    });
    previous.addEventListener("click", () => show(index - 1));
    next.addEventListener("click", () => show(index + 1));
  });

  document.querySelectorAll("[data-office-filter]").forEach((button) => {
    button.addEventListener("click", () => {
      const filter = button.dataset.officeFilter;
      document
        .querySelectorAll("[data-office-filter]")
        .forEach((item) => {
          const active = item === button;
          item.classList.toggle("is-active", active);
          item.setAttribute("aria-selected", String(active));
        });
      document.querySelectorAll("[data-office-card]").forEach((office) => {
        office.hidden =
          filter !== "all" && office.dataset.officeCard !== filter;
      });
    });
  });
})();
