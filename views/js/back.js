/**
 * BO Dark Mode Module for PrestaShop back office
 *
 * @author Adorade
 * @copyright 2025-26 Adorade
 * @license MIT
 */

// Cache DOM selectors and frequently used values
const LOCAL_STORAGE_KEY = 'bo_darkModeEnabled';
const DARK_READER_CONFIG = {
    brightness: 100,
    contrast: 90,
    sepia: 0
};

// Optimize DarkReader fetch configuration with memoized headers
const fetchConfig = {
    headers: new Headers({'Access-Control-Allow-Origin': '*'}),
    mode: 'no-cors'
};

// Optimize DarkReader functions
const enableDarkReader = () => {
    DarkReader.setFetchMethod(url => window.fetch(url, fetchConfig));
    DarkReader.enable(DARK_READER_CONFIG);
};

// Disables Dark Reader
const disableDarkReader = () => DarkReader.disable();

// Initialize dark mode if enabled
window.localStorage.getItem(LOCAL_STORAGE_KEY) === 'yes' && enableDarkReader();

// Use immediate function with optimized DOM operations
(() => {
    const buttonHTML = `
        <li class="link-levelone" id="tab-BoDarkMode" data-submenu="1">
            <div class="link bo-darkmode-toggle">
                <i class="material-icons">brightness_6</i>
                <span>Toggle Dark Mode</span>
            </div>
        </li>`;

    const getDarkModeState = () => window.localStorage.getItem(LOCAL_STORAGE_KEY) === 'yes';

    const updateDarkModeUI = (button, isDarkMode) => {
        button?.classList.toggle('link-active', isDarkMode);
        console.log('Dark Mode Enabled:', DarkReader.isEnabled());
    };

    const toggleDarkMode = (button) => {
        const isDarkMode = getDarkModeState();
        window.localStorage.setItem(LOCAL_STORAGE_KEY, isDarkMode ? 'no' : 'yes');
        isDarkMode ? disableDarkReader() : enableDarkReader();
        updateDarkModeUI(button, !isDarkMode);
    };

    const initializeDarkMode = () => {
        const buttonContainer = document.querySelector("#tab-AdminDashboard") || document.querySelector("#subtab-AdminDashboard");
        if (!buttonContainer) return;

        buttonContainer.insertAdjacentHTML('afterend', buttonHTML);

        // Initialize localStorage if needed
        if (!window.localStorage.getItem(LOCAL_STORAGE_KEY)) {
            window.localStorage.setItem(LOCAL_STORAGE_KEY, 'no');
            disableDarkReader();
        }

        const darkModeButton = document.querySelector("#tab-BoDarkMode");
        if (!darkModeButton) return;

        updateDarkModeUI(darkModeButton, getDarkModeState());
    };

    // Event delegation setup
    const setupEventListeners = () => {
        const menu = document.querySelector('#tab-BoDarkMode');
        if (!menu) return;

        menu.addEventListener('click', (e) => {
            e.target.closest('.bo-darkmode-toggle') && toggleDarkMode(menu);
        });
    };

    // Optimize event listeners
    document.addEventListener('DOMContentLoaded', initializeDarkMode);
    window.addEventListener('load', setupEventListeners);
})();
