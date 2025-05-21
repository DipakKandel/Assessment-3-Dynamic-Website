-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2025 at 04:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasty_treasures`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` datetime NOT NULL,
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `name`, `email`, `message`, `submitted_at`, `is_read`) VALUES
(1, 'Dipak Kandel', 'dipak.itsme@gmail.com', 'hi', '2025-05-16 11:56:12', 0),
(2, 'hello', 'hi@gmail.com', 'test2', '2025-05-16 21:47:16', 1),
(3, 'Dipak Kandel', 'dipak.itsme@gmail.com', 'test at 10 pm', '2025-05-16 23:14:52', 1),
(4, 'Dipak Kandel', 'dipak.itsme@gmail.com', 'k chha khabar', '2025-05-16 23:22:13', 1),
(5, 'Live Demo', 'Livedemo@gmail.com', 'test demo', '2025-05-21 11:11:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prep_time` varchar(20) DEFAULT '30 mins',
  `servings` int(11) DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `category`, `description`, `ingredients`, `instructions`, `image_path`, `featured`, `created_at`, `prep_time`, `servings`) VALUES
(1, 'Spaghetti Carbonara', 'Dinner', 'Creamy Italian pasta classic', 'Pasta, Eggs, Pancetta, Cheese, Pepper', '1. Cook pasta\n2. Mix eggs with cheese\n3. Fry pancetta\n4. Combine all', 'images/recipe/spaghetti.jpg', 1, '2025-05-14 03:04:29', '30 mins', 4),
(3, 'Chicken Curry', 'Dinner', 'Aromatic Indian dish', 'Chicken, Curry Powder, Coconut Milk, Vegetables', '1. Sauté chicken\n2. Add spices\n3. Simmer in coconut milk', 'images/recipe/curry.jpg', 1, '2025-05-14 03:04:29', '30 mins', 4),
(4, 'Avocado Toast', 'Breakfast', 'Creamy avocado on crispy sourdough with a hint of chili', '2 slices sourdough bread\n1 ripe avocado\n1/2 lemon\nSalt and pepper\nRed chili flakes\n2 eggs (optional)', '1. Toast bread until golden\n2. Mash avocado with lemon juice, salt, and pepper\n3. Spread on toast\n4. Sprinkle with chili flakes\n5. Top with poached eggs if desired', 'images/recipe/avocado_toast.jpg', 1, '2025-05-14 03:28:25', '30 mins', 4),
(6, 'Berry Smoothie Bowl', 'Breakfast', 'Thick smoothie topped with fresh fruits and granola', '1 frozen banana\n1 cup mixed berries\n1/2 cup Greek yogurt\n1/4 cup milk\nToppings: granola, chia seeds, fresh berries', '1. Blend banana, berries, yogurt and milk\n2. Pour into bowl\n3. Add toppings\n4. Serve immediately', 'images/recipe/smoothie_bowl.jpg', 1, '2025-05-14 03:28:25', '30 mins', 4),
(7, 'Beef Tacos', 'Dinner', 'Spicy ground beef in crispy taco shells', '500g ground beef\n1 onion\n2 cloves garlic\n1 packet taco seasoning\n12 taco shells\nToppings: lettuce, tomato, cheese, sour cream', '1. Brown beef with onion and garlic\n2. Add seasoning\n3. Assemble tacos with toppings', 'images/recipe/tacos.jpg', 1, '2025-05-14 03:28:25', '30 mins', 4),
(8, 'Chocolate Chip Cookies', 'Dessert', 'Classic chewy cookies with melty chocolate', '250g flour\n1 tsp baking soda\n1/2 tsp salt\n170g butter\n150g brown sugar\n100g white sugar\n2 eggs\n2 cups chocolate chips', '1. Cream butter and sugars\n2. Add eggs\n3. Mix dry ingredients\n4. Fold in chocolate chips\n5. Bake at 180°C for 10-12 mins', 'images/recipe/cookies.jpg', 1, '2025-05-14 03:28:25', '30 mins', 4),
(9, 'Greek Salad', 'Lunch', 'Fresh Mediterranean salad with feta cheese', '1 cucumber\n4 tomatoes\n1 red onion\n200g feta cheese\nKalamata olives\nOlive oil\nOregano', '1. Chop vegetables\n2. Cube feta\n3. Combine all ingredients\n4. Dress with oil and oregano', 'images/recipe/greek_salad.jpg', 0, '2025-05-14 03:28:25', '30 mins', 4),
(10, 'Vegetable Curry', 'Dinner', 'Hearty vegetarian curry with coconut milk', '1 sweet potato\n1 bell pepper\n1 cup chickpeas\n1 can coconut milk\n2 tbsp curry paste\nRice to serve', '1. Sauté vegetables\n2. Add curry paste\n3. Pour coconut milk\n4. Simmer 20 mins\n5. Serve with rice', 'images/recipe/vegetable_curry.jpg', 1, '2025-05-14 03:28:25', '30 mins', 4),
(11, 'Pancakes', 'Breakfast', 'Fluffy American-style pancakes', '200g flour\n1 tbsp sugar\n2 tsp baking powder\n1 egg\n300ml milk\nButter for frying', '1. Mix dry ingredients\n2. Add wet ingredients\n3. Cook on hot griddle\n4. Serve with maple syrup', 'images/recipe/pancake.jpg', 1, '2025-05-14 03:28:25', '30 mins', 4),
(17, 'kukhura ko masu', 'Lunch', 'kukhura ko masu', 'kukhura ko masu', 'kukhura ko masu', 'images/recipe/default.jpg', 1, '2025-05-18 00:28:28', '30 mins', 4),
(26, 'live demo', 'Dinner', 'live demo', 'live demo', 'live demo', 'images/recipe/default.jpg', 0, '2025-05-21 01:12:53', '30 mins', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `title`, `content`, `image_path`, `created_at`) VALUES
(20, 'Knife Skills 101', 'Master these essential knife techniques for safer, more efficient prep work:\r\n1. The Claw Grip: Curl your fingers under when holding food to protect fingertips\r\n2. Rock Chop: Use a rocking motion with your chef\'s knife for herbs and small items\r\n3. Guillotine Cut: For round foods like carrots, create a flat side first for stability\r\n4. Sharpening: Hone your blade before each use; sharpen monthly with a whetstone\r\n\r\nPro Tip: Keep a damp towel under your cutting board to prevent slipping.', 'images/tips/knife_skills.jpg', '2025-05-14 04:37:30'),
(21, 'Perfect Rice Every Time', 'Follow this foolproof method for flawless rice:\r\n1. Rinse rice in a fine mesh strainer until water runs clear (removes excess starch)\r\n2. Use the finger method: \r\n   - Add rice to pot\r\n   - Touch surface with fingertip\r\n   - Add water until it reaches your first knuckle\r\n3. Bring to boil, then reduce to lowest heat\r\n4. Cook covered for 15 mins (white rice) or 40 mins (brown)\r\n5. Let rest 10 mins before fluffing\r\n\r\nWater Ratios:\r\n- White rice: 1:1.5 (rice:water)\r\n- Brown rice: 1:2\r\n- Basmati: 1:1.25', 'images/tips/perfect_rice.jpg', '2025-05-14 04:37:30'),
(22, 'Herb Storage Mastery', '\r\nPreserve fresh herbs for weeks with these methods:\r\n\r\nTender Herbs (cilantro, parsley, dill):\r\n\r\n1. Trim stems\r\n2. Place in jar with 1\" water\r\n3. Cover loosely with plastic bag\r\n4. Refrigerate (change water every 3 days)\r\n\r\nHardy Herbs (rosemary, thyme):\r\n\r\n1. Wrap in damp paper towel\r\n2. Place in airtight container\r\n3. Refrigerate\r\n\r\nFreezing Option:\r\n\r\n1. Chop herbs\r\n2. Mix with olive oil (1:1 ratio)\r\n3. Freeze in ice cube trays\r\n', 'images/tips/herbs_storage.jpg', '2025-05-14 04:37:30'),
(23, 'Meat Resting Science', 'Why resting meat is crucial:\r\n1. Juices redistribute evenly (up to 20% more moisture retention)\r\n2. Carryover cooking raises internal temp 5-10°F\r\n3. Allows proteins to relax for tender results\r\n\r\nResting Times:\r\n- Steaks: 5-10 mins\r\n- Roasts: 15-30 mins\r\n- Whole poultry: 30-45 mins\r\n\r\nTip: Tent loosely with foil to retain warmth without steaming', 'images/tips/meat_resting.jpg', '2025-05-14 04:37:30'),
(24, 'Garlic Peeling Hack', '3 lightning-fast peeling methods:\r\n\r\n1. Jar Method:\r\n   - Separate cloves\r\n   - Place in mason jar\r\n   - Shake vigorously for 20 seconds\r\n   - Skins will separate completely\r\n\r\n2. Microwave Method:\r\n   - Microwave whole bulb for 10 seconds\r\n   - Cloves will pop out easily\r\n\r\n3. Crush Technique:\r\n   - Place clove under flat knife blade\r\n   - Press firmly to loosen skin', 'images/tips/garlic_peeling.jpg', '2025-05-14 04:37:30'),
(25, 'Oven Thermometer Truth', 'Why you need an independent oven thermometer:\r\n\r\n- Most ovens are inaccurate by ±25°F\r\n- Hot spots can vary up to 50°F\r\n- Digital displays often show target temp, not actual\r\n\r\nTesting Your Oven:\r\n1. Place thermometer in center rack\r\n2. Preheat to 350°F\r\n3. Check after 20 minutes\r\n4. Adjust dial accordingly or note the offset\r\n\r\nPro Tip: Rotate pans halfway through baking for even cooking', 'images/tips/oven_thermometer.jpg', '2025-05-14 04:37:30'),
(26, 'Non-Stick Pan Care', 'Extend your non-stick cookware\'s lifespan:\r\n\r\nDo:\r\n- Use silicone, wood, or plastic utensils\r\n- Clean with soft sponge and mild detergent\r\n- Store with protective layer between pans\r\n- Use low to medium heat only\r\n\r\nDon\'t:\r\n- Use metal utensils\r\n- Preheat empty pans\r\n- Use cooking sprays (builds up residue)\r\n- Put in dishwasher (degrades coating)\r\n\r\nWhen to Replace: When coating flakes or food sticks consistently', 'images/tips/nonstick_care.jpg', '2025-05-14 04:37:30'),
(27, 'Egg Freshness Test', 'How to check egg freshness without cracking:\r\n\r\n1. Float Test:\r\n   - Fill bowl with cold water\r\n   - Gently place egg inside\r\n   - Fresh: Sinks flat on bottom\r\n   - 1-2 weeks: Slight tilt upward\r\n   - Old: Floats to top (discard)\r\n\r\n2. Shake Test:\r\n   - Shake gently near ear\r\n   - Fresh: No sound\r\n   - Old: Sloshing sound (air pocket expanded)\r\n\r\n3. Visual Check:\r\n   - Crack onto plate\r\n   - Fresh: Thick, gelatinous white\r\n   - Old: Thin, watery white', 'images/tips/egg_test.jpg', '2025-05-14 04:37:30'),
(32, 'test demo tips', 'test demo tips', 'images/tips/default.jpg', '2025-05-21 01:13:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
