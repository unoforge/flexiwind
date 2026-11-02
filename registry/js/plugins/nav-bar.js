import { toggleNavbar } from "@flexilla/utilities";

export function NavbarPlugin(Alpine) {
    Alpine.directive("navbar", (el, {}, { cleanup }) => {
        const nav = toggleNavbar({
            navbarElement: el,
        });
        cleanup(() => {
            nav.cleanup();
        });
    });
}