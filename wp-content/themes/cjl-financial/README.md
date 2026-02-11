# CJL Financial Solutions WordPress Theme

A fully customized WordPress theme converted from HTML/CSS/JavaScript to a dynamic WordPress theme.

## Features

- **Fully Responsive Design** - Works on all devices
- **Dynamic Content Management** - Manage services, alliances, FAQs, and news through WordPress admin
- **Custom Post Types** - Services, Alliances, and FAQs
- **Contact Form** - AJAX-powered contact form with email notifications
- **Newsletter Subscription** - Newsletter signup functionality
- **Customizer Integration** - Easy customization through WordPress Customizer
- **Widget Areas** - Footer widget areas for flexible content
- **SEO Friendly** - Proper WordPress structure and semantic HTML

## Installation

1. Upload the `cjl-financial` folder to `/wp-content/themes/` directory
2. Activate the theme through the 'Appearance' menu in WordPress
3. Go to Appearance > Customize to configure theme settings

## Theme Structure

```
cjl-financial/
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   └── responsive.css
│   ├── img/
│   │   └── [all images]
│   └── js/
│       └── script.js
├── template-parts/
│   ├── hero-section.php
│   ├── services-section.php
│   ├── alliances-section.php
│   ├── news-section.php
│   ├── faq-section.php
│   └── contact-section.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── front-page.php
├── single.php
├── page.php
├── search.php
├── 404.php
└── style.css
```

## Customization

### Customizer Options

1. **Contact Information** - Set phone, email, and address
2. **Social Media Links** - Add Facebook, LinkedIn, and Twitter/X URLs
3. **Hero Section** - Customize hero title, description, and button

### Custom Post Types

#### Services
- Create services posts to display in the services section
- Add featured images for service images
- Use custom fields for service icons and subtitles

#### Alliances
- Create alliance posts with featured images
- Set order using custom fields

#### FAQs
- Create FAQ posts with questions as titles and answers as content
- Set order using custom fields

### Menu Setup

1. Go to Appearance > Menus
2. Create a new menu
3. Assign it to "Primary Menu" location
4. Add your menu items

### Widget Areas

The theme includes 4 footer widget areas:
- Footer Widget 1
- Footer Widget 2
- Footer Widget 3
- Footer Widget 4

Go to Appearance > Widgets to add widgets to these areas.

## Support

For theme support and customization, please refer to the WordPress Codex or contact your developer.

## License

GPL v2 or later
