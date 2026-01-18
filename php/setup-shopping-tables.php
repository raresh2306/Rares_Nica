<?php
require_once 'config.php';

// Create categories and products tables for the shopping system
function createShoppingTables() {
    $conn = getDBConnection();
    
    try {
        // Create categories table
        $categoriesSql = "
            CREATE TABLE IF NOT EXISTS categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL UNIQUE,
                description TEXT,
                icon_class VARCHAR(50),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        
        $conn->query($categoriesSql);
        echo "Categories table created successfully\n";
        
        // Create products table
        $productsSql = "
            CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                description TEXT,
                price DECIMAL(10,2) NOT NULL,
                image_url VARCHAR(500),
                category_id INT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
            )
        ";
        
        $conn->query($productsSql);
        echo "Products table created successfully\n";
        
        // Insert default categories
        $insertCategories = "
            INSERT IGNORE INTO categories (name, description, icon_class) VALUES
            ('Jerseys', 'Kit jerseys and Training kits', 'fas fa-tshirt'),
            ('Fashion', 'Jackets, sweatshirts, and more', 'fas fa-running'),
            ('Memorabilia', 'Gifts for your favorite fan', 'fas fa-gift')
        ";
        
        $conn->query($insertCategories);
        echo "Default categories inserted successfully\n";
        
        // Get category IDs for product insertion
        $categories = [];
        $result = $conn->query("SELECT id, name FROM categories");
        while ($row = $result->fetch_assoc()) {
            $categories[$row['name']] = $row['id'];
        }
        
        // Insert products with their categories
        $products = [
            // Jerseys Category
            ['Home Jersey 2025/26', 'Official FC Barcelona home jersey for the current season. Made with premium materials and featuring the iconic Blaugrana colors.', 89.99, 'images/homekit.jpg', $categories['Jerseys']],
            ['Away Jersey 2025/26', 'Official FC Barcelona away jersey featuring the iconic Mamba logo as a tribute to basketball legend Kobe Bryant.', 89.99, 'images/awaykit.jpg', $categories['Jerseys']],
            ['Third Jersey 2025/26', 'The color scheme is a homage to the \'08/\'09 season when Barcelona completed the historic "Sextuple".', 89.99, 'images/third.jpg', $categories['Jerseys']],
            ['"El Clásico" Jersey 2025/26', 'The kit is a tribute to the historic "El Clásico" match between FC Barcelona and Real Madrid in 2005.', 89.99, 'images/fourth.jpg', $categories['Jerseys']],
            ['Pre-match Fourth Shirt', 'FC Barcelona\'s pre-match fourth shirt for the 2025/26 season.', 64.99, 'images/prematch-fourth.jpg', $categories['Jerseys']],
            ['Training Shirt Fourth Kit', 'FC Barcelona\'s training shirt fourth kit for the 2025/26 season.', 74.99, 'images/training-fourth.jpg', $categories['Jerseys']],
            ['Pre-match Home Shirt', 'FC Barcelona\'s pre-match home shirt for the 2025/26 season.', 64.99, 'images/prematch-home.jpg', $categories['Jerseys']],
            ['Pre-match Third Shirt', 'FC Barcelona\'s Third pre-match shirt for the 25/26 season.', 64.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO251006A62974_med.jpg?v=1759757016', $categories['Jerseys']],
            ['Jersey Retro Basket 94', 'FC Barcelona retro jersey for the 1994/95 basketball season.', 89.99, 'images/basket.jpg', $categories['Jerseys']],
            
            // Fashion Category
            ['Jacket Barca Nike GX', 'FC Barcelona\'s jacket for the 2025/26 season.', 79.99, 'images/jacket.png', $categories['Fashion']],
            ['Jacket tech fleece Barça Nike', 'FC Barcelona\'s tech fleece jacket for the 2025/26 season.', 134.99, 'images/jacket-tech.jpg', $categories['Fashion']],
            ['Player Anthem Jacket Home', 'FC Barcelona\'s player anthem jacket for home games.', 149.99, 'images/player-anthem-jacket.jpg', $categories['Fashion']],
            ['Pre-match Sweatshirt', 'FC Barcelona\'s pre-match sweatshirt for the 2025/26 season.', 79.99, 'images/prematch-sweat.jpg', $categories['Fashion']],
            ['Tracksuit 2025/26', 'FC Barcelona\'s tracksuit for the 2025/26 season.', 139.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO251103A79838_med.jpg?v=1762353934&width=823', $categories['Fashion']],
            ['Tee purple Barca Nike', 'FC Barcelona x Nike purple tee with Spotify logo on the side.', 44.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO250804A24208_med.jpg?v=1754476647&width=823', $categories['Fashion']],
            ['Jacket Barca Nike', 'Get in trend with the new FC Barcelona x Nike Jacket.', 139.99, 'https://store.fcbarcelona.com/cdn/shop/files/MGA1324_Easy-Resize.com.jpg?v=1763387050&width=823', $categories['Fashion']],
            ['T-Shirt Barca x Kobe Bryant', 'FC Barcelona x Kobe Bryant away T-Shirt express.', 54.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO250925A56753_med.jpg?v=1758809038&width=823', $categories['Fashion']],
            ['Coach Training T-Shirt', 'FC Barcelona coach training t-shirt for the 2025/26 season.', 49.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO250912A47095_med.jpg?v=1757941027&width=823', $categories['Fashion']],
            ['Tracksuit FC Barcelona T90', 'FC Barcelona x Nike third tracksuit for the 25/26 season.', 139.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO251006A63146_med.jpg?v=1759757137&width=823', $categories['Fashion']],
            ['Third Anthem Jacket T90', 'FC Barcelona\'s Third anthem jacket for the 25/26 season.', 139.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO251006A62977_med.jpg?v=1759757066&width=823', $categories['Fashion']],
            ['Tee Barca x Nike T90', 'FC Barcelona x Nike T90 T-Shirt featuring Spotify logo.', 54.99, 'https://store.fcbarcelona.com/cdn/shop/files/VO250917A51534_med.jpg?v=1758180897&width=823', $categories['Fashion']],
            ['Retro 1899 Sweatshirt', 'FC Barcelona retro turquoise sweatshirt.', 69.99, 'https://store.fcbarcelona.com/cdn/shop/files/Retro_Players_Baixa-7928.jpg?v=1763462680&width=823', $categories['Fashion']],
            ['Retro Oversized T-Shirt', 'FC Barcelona retro polo shirt oversized for men.', 59.99, 'https://store.fcbarcelona.com/cdn/shop/files/Bolet_Baixa-11795.jpg?v=1765970839&width=823', $categories['Fashion']],
            ['Spotify Camp Nou Tee', 'FC Barcelona Camp Nou retro tee.', 29.99, 'https://store.fcbarcelona.com/cdn/shop/files/CORE-II4082_391dac34-f71d-4453-acdc-51b48962fdaf.jpg?v=1740042048&width=823', $categories['Fashion']],
            
            // Memorabilia Category
            ['Mini Spotify Camp Nou', 'FC Barcelona miniature Spotify Camp Nou.', 44.99, 'https://store.fcbarcelona.com/cdn/shop/files/FotosMaqueta-2.jpg?v=1763466576&width=823', $categories['Memorabilia']],
            ['Old Camp Nou Net', 'A part of the away goal net of the old Camp Nou.', 79.99, 'https://store.fcbarcelona.com/cdn/shop/files/76079_1.jpg?v=1765888308&width=823', $categories['Memorabilia']],
            ['Grass from Camp Nou', 'From the last game at Camp Nou in 2022/2023 season.', 79.99, 'images/grass.jpg', $categories['Memorabilia']],
            ['Net Keychain', 'A keychain with the net from 2022/2023 season.', 29.99, 'https://store.fcbarcelona.com/cdn/shop/files/75490_1.jpg?v=1721372454&width=823', $categories['Memorabilia']],
            ['Crest Insignia', 'A crest insignia featuring a diamond..', 699.00, 'images/crest.jpg', $categories['Memorabilia']]
        ];
        
        // Insert products
        $stmt = $conn->prepare("INSERT IGNORE INTO products (name, description, price, image_url, category_id) VALUES (?, ?, ?, ?, ?)");
        
        foreach ($products as $product) {
            $stmt->bind_param("ssdsi", $product[0], $product[1], $product[2], $product[3], $product[4]);
            $stmt->execute();
        }
        
        echo "Products inserted successfully\n";
        
        // Sync to Node.js backend
        $syncData = [
            'categories' => [],
            'products' => []
        ];
        
        // Get all categories for sync
        $result = $conn->query("SELECT * FROM categories");
        while ($row = $result->fetch_assoc()) {
            $syncData['categories'][] = $row;
        }
        
        // Get all products for sync
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()) {
            $syncData['products'][] = $row;
        }
        
        // Sync to backend
        syncToBackend('/api/sync/shopping-data', $syncData);
        echo "Data synced to Node.js backend\n";
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    } finally {
        $conn->close();
    }
}

// Run the function
createShoppingTables();
?>
