# DOM Usage in Project

This document shows where and how the Document Object Model (DOM) is used in this project.

## Overview

The DOM is used extensively throughout the JavaScript files to:
- Select and manipulate HTML elements
- Add event listeners for user interactions
- Dynamically update page content
- Show/hide elements based on user state
- Create new HTML elements dynamically

---

## 1. `js/script.js` - Main Frontend Script

### DOM Element Selection
- **Line 6**: `document.querySelector('.replace-me')` - Selects element for text replacement animation
- **Line 19**: `document.querySelector('.navbar')` - Selects navigation bar
- **Line 20**: `document.querySelector('#to-top')` - Selects back-to-top button
- **Line 44-46**: Selects video modal elements
- **Line 71**: `document.getElementById('cookieConsentModal')` - Gets cookie consent modal
- **Line 92**: `document.getElementById('acceptCookiesBtn')` - Gets accept cookies button
- **Line 93**: `consentModalEl.querySelector('.btn-outline-light[data-bs-dismiss]')` - Finds reject button
- **Line 123**: `consentModalEl.querySelector('.btn-close')` - Finds close button
- **Line 137**: `document.querySelectorAll('a[href^="#"]')` - Selects all anchor links for smooth scroll
- **Line 143**: `document.getElementById(targetId)` - Gets target element for smooth scrolling
- **Line 151**: `document.querySelector('#to-top')` - Gets back-to-top button
- **Line 162**: `document.querySelector('#contact form')` - Selects contact form
- **Line 165**: `form.querySelector('#agree-check')` - Gets checkbox element
- **Line 166**: `form.querySelector('input[type="submit"]')` - Gets submit button
- **Line 214**: `document.getElementById('formSuccessModal')` - Gets success modal
- **Line 239**: `document.querySelectorAll('.player-card')` - Selects all player cards
- **Line 240-250**: Multiple `getElementById()` calls to get modal elements

### DOM Manipulation
- **Lines 24-28**: `classList.add()` - Adds CSS classes to navbar and button on scroll
- **Lines 30-34**: `classList.remove()` - Removes CSS classes when scrolling back up
- **Line 100**: `addEventListener('click')` - Adds click handler to accept button
- **Line 112**: `addEventListener('click')` - Adds click handler to reject button
- **Line 125**: `addEventListener('click')` - Adds click handler to close button
- **Line 141**: `addEventListener('click')` - Adds click handler for smooth scroll links
- **Line 153**: `addEventListener('click')` - Adds click handler for back-to-top button
- **Line 170**: `addEventListener('change')` - Listens for checkbox changes
- **Line 175**: `addEventListener('submit')` - Handles form submission
- **Line 193**: `submitBtn.disabled = true` - Disables submit button
- **Line 223**: `form.reset()` - Resets form after submission
- **Line 224**: `submitBtn.disabled = true` - Keeps button disabled after reset
- **Line 253**: `card.addEventListener('click')` - Adds click handler to each player card
- **Line 254-262**: `getAttribute()` - Gets data attributes from player cards
- **Line 265**: `card.querySelector('img')` - Finds image within card
- **Line 267-268**: `setAttribute()` - Sets image source and alt text
- **Line 271-273**: `textContent` - Sets text content for modal elements
- **Line 279, 283**: `innerHTML` - Sets HTML content for player stats
- **Line 288**: `innerHTML = ''` - Clears stats if none exist
- **Line 293**: `textContent` - Sets detail text
- **Line 301-302**: `classList.remove()` and `setAttribute()` - Enables bio button
- **Line 305-307**: `classList.add()` and `setAttribute()` - Disables bio button

### DOM Events
- **Line 39**: `document.addEventListener('DOMContentLoaded', userScroll)` - Waits for DOM to load
- **Line 22**: `window.addEventListener('scroll')` - Listens for scroll events
- **Line 317**: `document.addEventListener('DOMContentLoaded')` - Initializes functions on page load

---

## 2. `js/auth-php.js` - Authentication System

### DOM Element Selection
- **Line 35-38**: Multiple `getElementById()` calls for login/signup tabs and forms
- **Line 51-53**: Gets form elements and logout button
- **Line 68**: `getElementById('signupEmail')` - Gets email input for validation
- **Line 96-97**: Gets alert div and email input
- **Line 138-143**: Gets all tab and form elements for switching
- **Line 150**: Gets email input for clearing validation
- **Line 172-174**: Gets login form inputs and alert div
- **Line 214-217**: Gets signup form inputs and alert div
- **Line 244-245**: Gets signup form and email input
- **Line 255**: Gets email input for validation feedback
- **Line 302-304**: Gets authentication UI elements
- **Line 317-318**: Gets form containers

### DOM Manipulation
- **Line 41**: `addEventListener('click')` - Handles login tab click
- **Line 45**: `addEventListener('click')` - Handles signup tab click
- **Line 56**: `addEventListener('submit')` - Handles login form submission
- **Line 60**: `addEventListener('submit')` - Handles signup form submission
- **Line 64**: `addEventListener('click')` - Handles logout button click
- **Line 71**: `addEventListener('blur')` - Validates email on blur
- **Line 79**: `addEventListener('input')` - Validates email on input (debounced)
- **Line 117**: `classList.add('is-invalid')` - Marks email as invalid
- **Line 123-124**: `classList.remove()` and `classList.add('is-valid')` - Marks email as valid
- **Line 146-147**: `innerHTML = ''` - Clears alert messages
- **Line 152**: `classList.remove()` - Clears validation classes
- **Line 156-159**: `classList.add()` and `classList.remove()` - Switches to login tab
- **Line 161-164**: `classList.add()` and `classList.remove()` - Switches to signup tab
- **Line 177**: `innerHTML = ''` - Clears login alert
- **Line 195**: `getElementById('loginForm').reset()` - Resets login form
- **Line 220**: `innerHTML = ''` - Clears signup alert
- **Line 247**: `classList.remove()` - Clears validation classes
- **Line 257-258**: `classList.add()` and `classList.remove()` - Marks email as invalid
- **Line 292**: `innerHTML` - Sets alert message HTML
- **Line 306**: `style.display = 'none'` - Hides auth forms
- **Line 308**: `style.display = 'block'` - Shows user info section
- **Line 310**: `textContent` - Sets user name text
- **Line 320**: `style.display = 'block'` - Shows auth forms
- **Line 321**: `style.display = 'none'` - Hides user info section

### DOM Events
- **Line 6**: `document.addEventListener('DOMContentLoaded')` - Initializes on page load

---

## 3. `js/playerBiosPage.js` - Dynamic Player Bios

### DOM Element Selection
- **Line 3**: `document.getElementById('biosContainer')` - Gets container for player bios

### DOM Manipulation
- **Line 16**: `document.createElement('section')` - Creates new section element
- **Line 17**: `section.id = player.id` - Sets element ID
- **Line 18**: `section.className = '...'` - Sets CSS classes
- **Line 19**: `section.innerHTML = '...'` - Sets HTML content with player data
- **Line 41**: `container.appendChild(section)` - Appends section to container

### DOM Events
- **Line 1**: `document.addEventListener('DOMContentLoaded')` - Waits for DOM before executing

---

## 4. `js/playerProfilePage.js` - Individual Player Profiles

### DOM Element Selection
- **Line 4-6**: `document.body.dataset` - Reads data attribute from body element
- **Line 9**: `document.getElementById('playerProfileRoot')` - Gets root container

### DOM Manipulation
- **Line 14-15**: `innerHTML` - Sets error message if player not found
- **Line 24**: `innerHTML` - Dynamically generates entire player profile HTML

### DOM Events
- **Line 1**: `document.addEventListener('DOMContentLoaded')` - Waits for DOM before executing

---

## 5. `js/update-matches.js` - Match Data Updater

**Note**: This is a Node.js script that runs server-side, so it doesn't use browser DOM APIs. However, it manipulates HTML file content using string operations to update the DOM structure in `matches.html`.

---

## Summary of DOM Methods Used

### Selection Methods
- `document.querySelector()` - Selects first matching element
- `document.querySelectorAll()` - Selects all matching elements
- `document.getElementById()` - Selects element by ID
- `element.querySelector()` - Selects within an element

### Manipulation Methods
- `element.innerHTML` - Gets/sets HTML content
- `element.textContent` - Gets/sets text content
- `element.setAttribute()` - Sets element attribute
- `element.getAttribute()` - Gets element attribute
- `element.classList.add()` - Adds CSS class
- `element.classList.remove()` - Removes CSS class
- `element.style.display` - Shows/hides element
- `element.disabled` - Enables/disables form elements
- `element.reset()` - Resets form

### Creation Methods
- `document.createElement()` - Creates new HTML element
- `element.appendChild()` - Adds element to DOM

### Event Methods
- `element.addEventListener()` - Attaches event listener
- `document.addEventListener('DOMContentLoaded')` - Waits for DOM ready
- `window.addEventListener()` - Listens to window events

---

## Key Use Cases

1. **Dynamic Content Loading**: Player bios and profiles are generated dynamically
2. **Form Handling**: Login, signup, and contact forms use DOM for validation and submission
3. **UI Updates**: Navigation bar, modals, and alerts are updated based on user interactions
4. **Event Handling**: Click, scroll, submit, and input events are handled throughout
5. **Element Creation**: New HTML elements are created and inserted into the page
