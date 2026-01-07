# Enhanced Members Plugin for Elgg

An enhanced members listing plugin for Elgg 5.1+ with multiple sorting and filtering options.

## Features

- **Multiple Viewing Options:**
  - Newest members (default)
  - By name (alphabetical)
  - Popular members (by friend count)
  - Online members
  - Active today
  - Active this week
  - Avatar gallery view
  - Banned members (admin only)

- **Search Functionality:**
  - Search by name or username
  - Search by tags

- **Modern Elgg 5.1 Compatibility:**
  - Updated for Elgg 5.1.12
  - Uses modern event system
  - Proper route registration
  - Resource views pattern
  - QueryBuilder for database queries

## Requirements

- Elgg 5.1.12 or higher
- PHP 8.0 or higher

## Installation

1. Extract the plugin to your `mod/` directory or install via Composer
2. Log in as an administrator
3. Navigate to Administration → Plugins
4. Activate the "Members" plugin

## Usage

Once activated, a "Members" link will appear in your site menu. Users can:

- Browse members using different sorting options
- View online members
- See recently active members
- Search for specific members
- View member avatars in gallery mode

Administrators can additionally view banned members.

## License

GNU General Public License version 2

## Author

Core developers

## Changelog

### Version 5.1.0
- Complete rewrite for Elgg 5.1.12 compatibility
- Migrated to resource views pattern
- Updated database queries to use QueryBuilder
- Modern menu system implementation
- Added form views for search functionality
- Improved language strings
