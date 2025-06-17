CREATE TABLE jewelry (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  image_url VARCHAR(511) NOT NULL,
  styles JSON NOT NULL,
  occasions JSON NOT NULL,
  colors JSON NOT NULL,
  tags JSON NOT NULL
);

INSERT INTO jewelry (name, description, image_url, styles, occasions, colors, tags) VALUES
('Elegant Pearl Necklace', 'A timeless pearl necklace to complement formal and classic outfits.', 'https://placehold.co/300x300/8b5cf6/ffffff?text=Elegant+Pearl+Necklace', '["classic","formal"]', '["wedding","party","formal"]', '["white","silver"]', '["necklace","pearls","classic"]'),
('Boho Turquoise Earrings', 'Vibrant turquoise earrings perfect for a free-spirited boho look.', 'https://placehold.co/300x300/06b6d4/ffffff?text=Boho+Turquoise+Earrings', '["bohemian","casual"]', '["casual","festival","vacation"]', '["turquoise","silver","blue"]', '["earrings","turquoise","boho"]'),
('Minimalist Gold Ring', 'A sleek gold ring for modern, minimalist outfits.', 'https://placehold.co/300x300/fbbf24/000000?text=Minimalist+Gold+Ring', '["minimalist","modern","formal"]', '["work","formal","casual"]', '["gold"]', '["ring","gold","minimalist"]'),
('Vintage Sapphire Bracelet', 'A striking sapphire bracelet with vintage charm.', 'https://placehold.co/300x300/2563eb/ffffff?text=Vintage+Sapphire+Bracelet', '["vintage","classic"]', '["party","formal","wedding"]', '["blue","silver"]', '["bracelet","sapphire","vintage"]'),
('Casual Leather Choker', 'A trendy leather choker for everyday casual wear.', 'https://placehold.co/300x300/000000/ffffff?text=Casual+Leather+Choker', '["casual","modern"]', '["casual","work","vacation"]', '["black","brown"]', '["necklace","leather","casual"]'),
('Statement Crystal Earrings', 'Dazzling crystal earrings that draw attention at every event.', 'https://placehold.co/300x300/ebe534/000000?text=Statement+Crystal+Earrings', '["bold","party","glam"]', '["party","wedding","formal"]', '["clear","silver"]', '["earrings","crystal","statement"]');