# CRUD Blog CI

This repository contains the code for a blog CRUD website built using CodeIgniter 4 as the backend framework, MySQL as the database, and Bootstrap with custom CSS as the frontend. The frontend uses the Clean Blog template from StartBootstrap.

## Installation
Steps to install and run project:
1. Clone the repository: `git clone https://github.com/staryone/crud-blog-ci.git`
2. Navigate to the project directory: `cd crud-blog-ci`
3. Ensure `composer` is installed on your device
4. Open terminal and run `composer install`
5. Create a new MySQL database and import the database schema (see the [Database Schema](#database-schema) section)
6. Configure the database settings in the `.env` file.
7. Open terminal and run `php spark serve`
8. Run the project on a local server or hosting.

## Features

- **Create Blog**: Users can add new blog articles via the form located at `blog/add`. The required properties are:
  - `title` (string)
  - `content` (string)
  - `cover` (image file, optional)

- **Show All Blogs**: Displays all blog articles at the main URL `blog/`, with pagination (3 articles per page).

- **Show Single Blog**: Displays a single blog article in detail, based on the URL `blog/{url_blog}`.

- **Update Blog**: Users can edit existing blog articles via the form at `blog/edit/{id_blog}`. The required properties are the same as for creating a blog.

- **Delete Blog**: Users can delete a selected blog article.

- **Search Blogs**: Users can search for articles by keyword. The search results will display all articles with titles matching the given keyword.

## Data Validation Rules

- `title`:
  - Required
  - Maximum length: 255 characters
  - Minimum length: 3 characters
- `content`:
  - Required
  - Maximum length: 5000 characters
  - Minimum length: 10 characters
- `cover`:
  - Maximum size: 200 KB
  - MIME types allowed: `image/png`, `image/jpg`, `image/jpeg`
  - Extensions allowed: `png`, `jpg`, `jpeg`
  - Maximum dimensions: 1024x768 pixels

### Note
- The cover image is optional. If uploaded, it will be automatically stored in the folder `writable/uploads/images/`, and only the filename will be stored in the database.

### URL Generation
- The URL is automatically generated from the title by replacing spaces with hyphens (`-`) and converting all characters to lowercase.
- If a title is duplicated, a `-1` suffix is added to the URL to ensure uniqueness.

## Database Schema

```sql
CREATE TABLE `blogs` (
  `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `cover` VARCHAR(255),
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

