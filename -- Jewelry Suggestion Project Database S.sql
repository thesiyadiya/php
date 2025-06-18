-- Jewelry Suggestion Project Database Schema and Sample Data

CREATE DATABASE IF NOT EXISTS jewelry_suggestion;
USE jewelry_suggestion;

-- Table to store types of jewelry
CREATE TABLE IF NOT EXISTS jewelry_types (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL UNIQUE
);

-- Table to store styles
CREATE TABLE IF NOT EXISTS styles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL UNIQUE
);

-- Table to store occasions
CREATE TABLE IF NOT EXISTS occasions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL UNIQUE
);

-- Table to store colors
CREATE TABLE IF NOT EXISTS colors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL UNIQUE
);

-- Table to store jewelry items
CREATE TABLE IF NOT EXISTS jewelry_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  type_id INT NOT NULL,
  style_id INT NOT NULL,
  occasion_id INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  description TEXT,
  FOREIGN KEY (type_id) REFERENCES jewelry_types(id),
  FOREIGN KEY (style_id) REFERENCES styles(id),
  FOREIGN KEY (occasion_id) REFERENCES occasions(id)
);

-- Linking table for many-to-many relationship between jewelry items and colors
CREATE TABLE IF NOT EXISTS jewelry_colors (
  jewelry_id INT NOT NULL,
  color_id INT NOT NULL,
  PRIMARY KEY (jewelry_id, color_id),
  FOREIGN KEY (jewelry_id) REFERENCES jewelry_items(id),
  FOREIGN KEY (color_id) REFERENCES colors(id)
);

-- Insert types
INSERT IGNORE INTO jewelry_types (name) VALUES
('ring'),
('necklace'),
('bracelet'),
('earrings');

-- Insert styles
INSERT IGNORE INTO styles (name) VALUES
('modern'),
('vintage'),
('classic');

-- Insert occasions
INSERT IGNORE INTO occasions (name) VALUES
('wedding'),
('birthday'),
('anniversary');

-- Insert colors
INSERT IGNORE INTO colors (name) VALUES
('gold'),
('yellow'),
('silver'),
('grey'),
('white'),
('cream'),
('black'),
('blue'),
('red'),
('green'),
('pink');

-- Insert jewelry items
INSERT INTO jewelry_items (name, type_id, style_id, occasion_id, price, image_url, description) VALUES
('Modern Gold Ring', 1, 1, 1, 500.00, 'https://placehold.co/300x200/6366f1/ffffff?text=Modern+Gold+Ring', 'Elegant modern gold wedding ring with smooth finish.'),
('Vintage Silver Necklace', 2, 2, 2, 150.00, 'https://placehold.co/300x200/9393a1/ffffff?text=Vintage+Silver+Necklace', 'Classic vintage-style silver necklace perfect for birthdays.'),
('Classic Diamond Earrings', 4, 3, 3, 1000.00, 'https://placehold.co/300x200/e0e0e0/000000?text=Classic+Diamond+Earrings', 'Timeless classic diamond earrings suitable for anniversaries.'),
('Modern Silver Bracelet', 3, 1, 2, 200.00, 'https://placehold.co/300x200/9393a1/ffffff?text=Modern+Silver+Bracelet', 'Sleek modern silver bracelet for stylish occasions.'),
('Vintage Pearl Ring', 1, 2, 3, 450.00, 'https://placehold.co/300x200/fdf6e3/000000?text=Vintage+Pearl+Ring', 'Vintage pearl ring with intricate artistry.'),
('Classic Gold Necklace', 2, 3, 1, 800.00, 'https://placehold.co/300x200/6366f1/ffffff?text=Classic+Gold+Necklace', 'Classic gold necklace ideal for wedding occasions.'),
('Modern Hoop Earrings', 4, 1, 2, 120.00, 'https://placehold.co/300x200/9393a1/ffffff?text=Modern+Hoop+Earrings', 'Trendy modern hoop earrings for casual or party wear.'),
('Vintage Charm Bracelet', 3, 2, 3, 350.00, 'https://placehold.co/300x200/6366f1/ffffff?text=Vintage+Charm+Bracelet', 'Vintage charm bracelet full of nostalgic elegance.');

-- Insert jewelry_colors relationships

-- For Modern Gold Ring: colors gold, yellow
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Modern Gold Ring' AND (c.name='gold' OR c.name='yellow');

-- For Vintage Silver Necklace: colors silver, grey
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Vintage Silver Necklace' AND (c.name='silver' OR c.name='grey');

-- For Classic Diamond Earrings: colors white, silver
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Classic Diamond Earrings' AND (c.name='white' OR c.name='silver');

-- For Modern Silver Bracelet: colors silver, grey
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Modern Silver Bracelet' AND (c.name='silver' OR c.name='grey');

-- For Vintage Pearl Ring: colors white, cream
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Vintage Pearl Ring' AND (c.name='white' OR c.name='cream');

-- For Classic Gold Necklace: colors gold, yellow
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Classic Gold Necklace' AND (c.name='gold' OR c.name='yellow');

-- For Modern Hoop Earrings: colors silver, grey
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Modern Hoop Earrings' AND (c.name='silver' OR c.name='grey');

-- For Vintage Charm Bracelet: colors gold, yellow
INSERT IGNORE INTO jewelry_colors (jewelry_id, color_id)
SELECT ji.id, c.id FROM jewelry_items ji, colors c
WHERE ji.name='Vintage Charm Bracelet' AND (c.name='gold' OR c.name='yellow');

-- Sample query to get suggestions filtering by type, style, occasion, budget, and color:
-- SELECT ji.* FROM jewelry_items ji
-- JOIN jewelry_types jt ON ji.type_id = jt.id
-- JOIN styles s ON ji.style_id = s.id
-- JOIN occasions o ON ji.occasion_id = o.id
-- JOIN jewelry_colors jc ON ji.id = jc.jewelry_id
-- JOIN colors c ON jc.color_id = c.id
-- WHERE jt.name = 'ring'
--   AND s.name = 'modern'
--   AND o.name = 'wedding'
--   AND ji.price <= 500
--   AND c.name = 'gold';
