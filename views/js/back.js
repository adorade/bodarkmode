/**
 * BO Dark Mode Module for PrestaShop back office
 *
 * @author Adorade
 * @copyright 2025-26 Adorade
 * @license MIT
 */

// Cache DOM selectors and frequently used values
const LOCAL_STORAGE_KEY = 'bo_darkModeEnabled';

// DarkReader theme settings used by the PrestaShop back office
const DARK_READER_THEME = {
    brightness: 100,
    contrast: 90,
    grayscale: 0,
    sepia: 0,
    darkSchemeBackgroundColor: '#181a1b',
    darkSchemeTextColor: '#e8e6e3',
    darkColorScheme: 'Default',
};

// CSS exceptions for charts and canvas elements that need a readable light background.
const DARK_READER_FIXES = {
    invert: [],
    css: 'canvas, svg.chart, .chart, [class*="chart"], [id*="chart"] { background: #e8e6e3 !important; }',
    ignoreInlineStyle: ['canvas', 'svg', '.chart', '[class*="chart"]', '[id*="chart"]'],
    ignoreImageAnalysis: ['canvas', 'svg', '.chart', '[class*="chart"]', '[id*="chart"]'],
};

// Optimize DarkReader fetch configuration with memoized headers
const fetchConfig = {
    headers: new Headers({'Access-Control-Allow-Origin': '*'}),
    mode: 'no-cors'
};

// Optimize DarkReader functions
const enableDarkReader = () => {
    DarkReader.setFetchMethod(url => window.fetch(url, fetchConfig));
    DarkReader.enable(DARK_READER_THEME, DARK_READER_FIXES);
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
