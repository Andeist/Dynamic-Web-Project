-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 05:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20222_wp2_412021010`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', 'goodfood345', 'jason.anthony571@gmail.com', '2023-06-26 21:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `bars`
--

CREATE TABLE `bars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gmaps_location` varchar(255) DEFAULT NULL,
  `web_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bars`
--

INSERT INTO `bars` (`id`, `name`, `image`, `gmaps_location`, `web_link`) VALUES
(6, 'Sherlocked', 'images/bars/sherlocked.png', 'https://goo.gl/maps/AwDvY8CV292Mtvej9', 'https://sherlocked.se'),
(7, 'Icebar Stockholm', 'images/bars/icebar_stockholm.png', 'https://goo.gl/maps/Riikri2ENdgt9AUF9', 'https://hotelcstockholm.com/icebar-stockholm-by-icehotel/'),
(8, 'Hard Rock Cafe', 'images/bars/hard_rock_cafe.png', 'https://goo.gl/maps/U1KFpuDC6aZYhdfn9', 'window.location.href=\'https://www.hardrock.com/locations.aspx'),
(9, 'Fasching Jazz Club', 'images/bars/fasching_stockholm.png', 'https://goo.gl/maps/dHxFCB3fGiEAHcxk6', 'https://www.fasching.se');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dessert_id` int(11) DEFAULT NULL,
  `drink_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `dessert_id`, `drink_id`, `comment_text`) VALUES
(1, 1, 1, NULL, 'hello!'),
(3, 1, NULL, 3, 'hello!');

-- --------------------------------------------------------

--
-- Table structure for table `desserts`
--

CREATE TABLE `desserts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `directions` text DEFAULT NULL,
  `video_embed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desserts`
--

INSERT INTO `desserts` (`id`, `name`, `description`, `image`, `ingredients`, `directions`, `video_embed`) VALUES
(1, 'Våfflor', 'Unlike the American or Belgium versions of waffles, Swedish waffles are slightly thinner and crispier. Another difference is that they don\'t contain any yeast in the recipe. This feature makes the texture somewhat similar to your regular pancakes. Back in the day, Swedish waffles used to come in square pieces. Now, they boast the famous heart shape and other patterns. And they can also go with jam and ice cream as a dessert dish. Like their love for pancakes, the Swedes also established a day when they especially enjoy eating waffles, which is May 25th. This day has a very fitting name: Våffeldagen or Waffle Day. It might be a surprise to learn that Våffledagen used to be a significant event in the past. As waffles contain eggs and milk, the Swedish farmers considered Våffledagen a time to celebrate a new farming season and an enlarged amount of eggs and milk.', 'images/desserts/vafflor.png', '2 cups (250 grams) all-purpose flour\r\n2 tablespoons (25 grams) granulated sugar\r\n1 1/2 teaspoons baking powder\r\n1 teaspoon vanilla sugar\r\n1/2 teaspoon salt\r\n2 large eggs\r\n1 1/4 cup (300 milliliters) milk\r\n6 tablespoons (85 grams) unsalted butter melted and slightly cooled, plus more for greasing', 'Step 1: In a large bowl, whisk together the flour, sugar, baking powder, vanilla sugar, and salt.\r\nStep 2: Mix in the eggs and milk, followed by the melted butter. Whisk until just combined.\r\nStep 3: Preheat a waffle iron according to manufacturer\'s instructions. Grease the heated iron with butter.\r\nStep 4: Pour in a ladleful of the prepared batter, about 1/4 cup (60 milliliters). Heat until the waffle is cooked through and golden. Transfer to a plate and repeat with remaining batter.\r\nStep 5: Serve warm with desired toppings such as lingonberry jam, whipped cream, or fresh fruit.', 'https://www.youtube.com/watch?v=sGjxuoM7Iz0'),
(2, 'Pannkakor', 'At first sight, it might be a challenge for you to differentiate between crepes and Swedish pancakes. But you will know once you take a bite, as crepes are usually chewy and thick thanks to the flour. As for Swedish pancakes, they are much lighter since they use more eggs and butter. However, try not to be deceived by the light texture, as Swedish pancakes are very buttery and fluffy. Make sure you can find premium butter for your Swedish pancakes as this ingredient will give the dish a rich flavor. Swedish people have a tradition of having pancakes together with soup on Thursdays. This custom is believed to have started in Catholic churches in Sweden back in the 15th century. These churches used to serve big meals on Thursday for the forthcoming Friday fast. This act, later on, became a well-loved tradition for almost every Swedish person. In school, there are times when they serve Pannakakor with jam instead of pea soup since children dislike this type of soup. This is how you make pancake the Swedish way, quick and delicious!', 'images/desserts/pannkakor.png', '2 eggs\r\n1 ¾ cup milk\r\n¾ cups flour\r\n1 oz (30g) butter , melted\r\n1 pinch salt', 'Step 1: In a large bowl, combine the eggs with a half of the milk. Whisk. Add the flour and mix well until smooth. Add the salt, the rest of the milk and melted butter. Mix.\r\nStep 2: Butter a frying pan over medium heat and pour a thin layer of batter on skillet, spreading it evenly to edges. Cook until the surface of the pancake looks dry, then flip it. Repeat with the remaining batter.\r\nStep 3: Serve with any sweet fillings and toppings you like. Enjoy!', 'https://www.youtube.com/watch?v=HqsHwbAvvdk'),
(3, 'Semla', 'One of Swedish people\'s favorite baked goods has to be Semla (plural form: Semlor), which is a type of wheat flour bun with an almond paste and whipped cream filling. It is different from regular buns thanks to the herbal taste of cardamom in the dough. Initially, Semla was something the Swedish people ate on Fettisdag, which means Shrove Tuesday or Fat Tuesday. These buns were the last meal before a fasting period for Christian people (the Lent). At first, people in Sweden ate Hetvägg, plain buns with hot milk in a bowl. But then they added almond paste and cream into the buns as a treat since they were frustrated with the strict observation of Lent. Such addition gave birth to the wonderful cream-filled buns of Semla that the Swedes adore today.', 'images/desserts/semla.png', 'Buns\r\n4 cups (20 oz) all purpose or bread flour, or more if needed\r\n2 tsp dry yeast\r\n1/3 cup (2.5 oz) + 1/2 tsp sugar, divided\r\n1/2 cup (4 oz) warm milk\r\n1/3 cup (2.5 oz) melted butter\r\n1 tsp salt\r\n1 egg, slightly beaten\r\n1 tsp cardamom\r\n1/2 cup (4 oz) lukewarm water\r\n\r\nGlaze\r\n1 egg yolk\r\n1 tbsp cream\r\n\r\nAlmond Paste\r\n1 fresh egg white\r\n1/2 cup ground almonds (without skins)\r\n3/4 cup powdered/confectioner’s sugar', 'Make the buns\r\nStep 1: In bread machine or stand mixer, place the lukewarm water, yeast and 1/2 tsp of sugar. Allow to rest for a few minutes, until the yeast begins to grow. Mix the milk, melted butter, beaten egg together, then add to the yeast mixture.\r\nStep 2: Add the cardamom, flour, 1/3 cup (2.5 oz) of sugar and salt, and turn on machine (dough setting on bread machine or use a dough hook if using a stand mixer.) Mix and knead by hand if you aren\'t using a machine.\r\nStep 3: Dough will be slightly sticky. Allow cycle to finish on dough setting; with stand mixer, or by hand, when the dough is ready, cover it and let rise on the counter until doubled in size.\r\nShape the buns\r\nStep 1: After it\'s risen, punch down the dough, and let rest for 5 minutes. Cut pieces of the dough and shape into round balls (about 15 to 18), and place onto a greased cookie sheet (or silicone sheet) about an inch apart. I baked mine with the buns too close together and they touched, so don\'t put them as close as I did in the photo below.\r\nStep 2: I also weighed mine so they would all be of equal size, however it\'s really unnecessary. Place the tray in the oven (do not turn it on) to rise for about half an hour or until doubled in size. (I put a large cup of boiling water in the oven for steam, so the buns don\'t get a hard crust).\r\nStep 3: Once doubled, remove the buns from the oven and brush with the egg glaze (just mix the egg and cream together and brush on gently.)\r\nStep 4: Preheat the oven to 350º F (175ºC) then cook the buns for approximately 20 minutes, or until golden brown. While they are baking, prepare the almond paste.\r\nMake the Marzipan\r\nStep 1: Whip the egg white until soft peaks form, then fold in the ground almonds and powdered sugar.\r\nStep 2: Cover and set aside.\r\nAssemble and Finish the Semlor\r\nStep 1: Remove the cooked buns from the tray, and place on a cooling rack.\r\nStep 2: When the Semlor are completely cool, whip the cream and assemble them.\r\nStep 3: Begin by cutting a top on each bun with a sharp knife, cutting down into the center of the bun to create a space for filling in the bun. Then put a teaspoonful, or more, of the almonds paste.\r\nStep 4: Next, top with whipped cream. I used my ISI Cream Whipper.\r\nStep 5: Place the top on the cream, and dust with powdered sugar. Repeat with remaining Semlor.', 'https://www.youtube.com/watch?v=G6EsiH5oYyE'),
(4, 'Kladdkaka', 'Kladdkaka, literally translated into “sticky cake” from Swedish, is one of the most preferred desserts in this Scandinavian country. And I can see why this is the case. Unlike regular chocolate cake, Kladdkaka offers a smooth and gooey texture. This texture will only feel like silk in your mouth. And, it\'s a once-in-a-lifetime experience if you get the chance to try kladdkaka at different cafes since each cafe has its recipe for this cake. Swedish people have their way of creating the perfect soft and sticky texture for their Kladdkaka. And the secret is to purposely underbake your cake just a little so that it can attain that required consistency of a standard Kladdkaka. You may think that this is no different from brownies, but I can assure you that each type is a gem on its own. While brownies are also great, they are dryer and slightly more dense. By contrast, Kladdkaka is usually softer and smoother in texture. Making Swedish sticky chocolate cake has never been this easy.', 'images/desserts/kladdkaka.png', 'Cake:\r\n10 tablespoons butter (I use salted)\r\n1 ⅓ cups sugar\r\n2 eggs\r\n5 tablespoons unsweetened cocoa powder\r\n¾ cup all-purpose flour\r\n1 teaspoon vanilla extract\r\n¼ teaspoon kosher salt\r\n\r\nTruffle topping\r\n½ cup heavy cream\r\n8 ounces semisweet chocolate chips\r\n1 teaspoon pure vanilla extract\r\nflaky sea salt I love Maldon\r\n\r\nGarnish\r\nwhipped cream, mint sprigs optional\r\nRidiculously Easy Raspberry Coulis optional', 'For the cake:\r\nStep 1: Preheat oven to 325˚F. Spray an 8-inch round or square cake pan with baking spray or grease the pan with butter and then dust with flour. Line the bottom of the pan with a round (or square) piece of parchment paper. Don\'t omit this or the cake will be difficult to remove from the pan.\r\nStep 2: Place butter in a medium-size microwave-safe bowl and cover bowl with a plate or paper towel. Cook in the microwave on high power for 1 ½ minutes, or until butter is melted.\r\nStep 3: Add sugar to the bowl with melted butter and whisk to combine. Add eggs, one at a time and stir well after each addition. Add the cocoa, flour, vanilla and salt. Stir just until all dry ingredients are incorporated.\r\nStep 4: Transfer batter to prepared pan and spread out to an even layer. Bake for 20-22 minutes. Don’t over bake. The cake should be slightly firm on the outside, but moist and sticky inside.\r\nStep 5: Cool completely OR let the cake cool for 10 minutes before adding truffle topping.\r\nFor the truffle topping:\r\nStep 1: While the cake is baking, wash out the bowl. After the cake comes out of the oven, heat the heavy cream in the clean bowl for 1 minute on high power. Add chocolate chips and vanilla. Stir and allow to sit for 1 minute. Then stir until all chocolate has melted and the mixture is smooth.\r\nStep 2: Pour truffle mixture over the semi-cooled cake and spread to an even layer.\r\nStep 3: Allow the truffle topping on the cake to cool for 10 minutes (otherwise, the salt will “melt” into the topping”), then sprinkle with about ¼ teaspoon flaky sea salt.\r\nStep 4: Cool the cake at room temperature for several hours, then refrigerate for 30 minutes before removing it from the pan.\r\nStep 5: To remove, run a thin-bladed knife around the outer edges of the cake. Invert pan onto a dinner plate and, holding the plate and pan together, give it a good shake downwards. If the cake doesn\'t release, go around the edges again with a knife then repeat with inverting cake. Once the cake is released, invert again so that the truffle layer is on the top.\r\nStep 6: Serve with our Ridiculously Easy Raspberry Coulis and a dollop of whipped cream, if desired.', 'https://www.youtube.com/watch?v=cy3DtDnPTSo');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `directions` text DEFAULT NULL,
  `video_embed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `description`, `image`, `ingredients`, `directions`, `video_embed`) VALUES
(3, 'Berry Saft', 'Saft, the drink all Swedish children adore the most. Saft is a sweet concentrate that\'s slightly fruity. People usually dilute Saft with water for a perfect refresher. There are a few variations in terms of the Saft\'s flavors. Swedish people can choose from lingonberry, elderflower, or rose hips. There are also options of citrus-flavored Saft if you prefer something less sweet, some of which are lemon and orange. Making Saft consists of cooking the fruits until they\'re soft. After that, this fruit concoction will go through sifting to release the concentrated essence, which would be the final product of Saft. The most traditional flavors of Saft you could find in Sweden are lingonberry and elderflower. This drink is most pleasant for children who just returned from playing in their backyard. But of course, anyone looking for something fresh on a summer\'s day can also enjoy Saft.', 'images/drinks/berry_saft.png', '2 quarts fresh blackberries\r\n1 ¼ cups water, or more as needed\r\n1 pound white sugar, or as needed', 'Step 1: Bring blackberries and water to a boil in a large pot until blackberries are softened, about 15 minutes. Remove from heat and mash berries using a potato masher.\r\nStep 2: Line a sieve with cheese cloth; place over a large pot. Pour mashed berries through cheese cloth-line sieve; let sit until all liquid has drained through cheese cloth, about 30 minutes. Stir 1 pound sugar per 1/2 gallon of drained blackberry juice.\r\nStep 3: Bring blackberry juice and sugar to a boil in a pot; cook until sugar is dissolved, about 5 minutes. Skim off any residue accumulated on top.\r\nStep 4: Sterilize jars and lids in boiling water for at least 5 minutes. Pack hot saft into the hot, sterilized jars, filling the jars to within 1/4 inch of the top. Run a knife or a thin spatula around the insides of the jars after they have been filled to remove any air bubbles. Wipe the rims of the jars with a moist paper towel to remove any food residue. Top with lids, and screw on rings. Store in refrigerator.', 'https://www.youtube.com/watch?v=w4S3c5oC4DY'),
(4, 'Glögg', 'Glögg is another Christmas drink probably more suitable for the grown-ups in Sweden. It\'s a type of cooked wine with sugar and spices. What gives Glögg its complexity and depth in taste is the combination of cloves, cinnamon, ginger, and cardamom. Glögg, despite being a Christmas drink, isn\'t similar to Julmust. It\'s a drink with the base of wine, with the addition of citrus fruits. In addition to that, Glögg is usually warm and isn\'t cold or carbonated like Julmust. And this drink is not suitable for children since it\'s alcoholic. Like their fondness for Julmust, the Swedes enjoy drinking Glögg in the winter. Most will choose to make their Glögg at home with a curated recipe. However, people still sell Glögg everywhere as a cup of warm wine while walking is always a good idea to fight the cold weather. For those who can\'t consume alcohol, there is a non-alcoholic version available. People make this by replacing wine with fruit juice. However, people usually serve the original Glögg with a dash of vodka and raisins.', 'images/drinks/glogg.png', '2 cinnamon sticks, broken into pieces\r\n1 tsp. cardamom pods\r\n1 small piece ginger, peeled\r\nZest of ½ orange\r\n6 whole cloves\r\n½ cup vodka\r\n1 750-ml bottle dry red wine\r\n1 cup ruby port or Madeira\r\n1 cup granulated sugar\r\n1 Tbsp. vanilla sugar\r\n½ blanched whole almonds\r\n½ cup dark raisins', 'Step 1: Crush cinnamon and cardamom in a mortar and pestle (or put them on a cutting board and crush with the bottom of a heavy pot.) Transfer to a small glass jar and add ginger, orange zest, cloves, and vodka. Let sit 1 day.\r\nStep 2: Strain vodka through a fine-mesh sieve into a large saucepan; discard spices. Add wine, port, granulated sugar, vanilla sugar, almonds, and raisins and heat over medium just until bubbles start to form around the edges.\r\nStep 3: Ladle glögg into mugs, with a few almonds and raisins in each one. Keep any remaining glögg warm over very low heat until ready to serve (do not let it boil).', 'https://www.youtube.com/watch?v=jq2g5O5DoNY'),
(5, 'Filmjölk', 'While I\'m calling Filmjölk Swedish yogurt, there\'s no official English name for this drink. In Norwegian, however, people call this “Kulturmelk”. To simplify, it\'s a kind of fermented milk from Sweden. But because the consistency is somewhat thick, it\'s considered a kind of yogurt. People first encountered Filmjölk as a supermarket product in 1931. However, homemade Filmjölk has been around in Sweden long before that. Records from the 18th century mentioned products similar to Filmjölk, meaning it\'s been around for centuries. Filmjölk usually goes with berries of sorts as breakfasts. In addition to that, Filmjölk is also enjoyable without any toppings. To some Swedish people\'s liking, a drop or two of honey makes it more pleasant to eat.', 'images/drinks/filmjolk.png', '1 quart milk (2% is my choice)\r\n1/3 cup filmjölk (siggi\'s brand)', 'Step 1: Combine the filmjölk and 2% milk in a quart canning jar.\r\nStep 2: Cover, and leave at room temperature for about 24 hours.\r\nStep 3: Stir and chill.', 'https://www.youtube.com/watch?v=mzEYIfRHBC0&feature=youtu.be'),
(7, 'Punsch', 'This drink also goes by “Arrack Punsch”. It\'s a type of liquor from arrack famous in Sweden, Finland, and other Nordic countries. It was in 1733 when the Swedish people first welcomed Punsch into their country. It started when a Swedish trade company began importing Batavian arrack from Java. Then Swedish nobles started combining arrack with the pricey imported tea and spirits to make pusnch. An earlier version of Punsch appeared in a book called “A Voyage To China And The East Indies” in 1771. In this version, Pehr Osbeck, Olof Tóren, and Carl Gustaf Ekerberg described Punsch as a mixture of arrack, water, sugar, and lemon or tamarind. At first sight, Punsch has a mesmerizing brown color. The aroma can be overpowering when you first take a sniff, but you\'ll grow to love it. When tasting Punsch, you will notice a deep musky caramel taste note, which becomes a warm vanilla sugar flavor surrounding your taste buds.', 'images/drinks/punsch.png', '1 lemon\r\n1 clove\r\n1 cardamom pod, crushed\r\n1 cup cachaça\r\n1 Darjeeling (or similar) tea bag\r\n1/2 cup hot water\r\n2/3 cup sugar', 'Step 1: Cut the lemon into thin slices and remove the seeds. Place entire slices in a sealable glass jar with the clove and crushed cardamom pod and add the cachaça. Seal and shake. Let the infusion sit for one day in a cool place away from direct sunlight.\r\nStep 2: Steep the tea bag in the hot water for 5 to 7 minutes. Remove the tea bag, add the sugar to the hot tea, and mix into a syrup. Let cool.\r\nStep 3: Pour the infused cachaça through a strainer lined with cheesecloth. Mix the infusion with the tea syrup. Let the mixture rest overnight. Store in a sealed container at room temperature or in the refrigerator for up to 5 months.', 'https://www.youtube.com/watch?v=SxSrQcyrMS0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'andeist', 'a@ukrida.ac.id', '$2y$10$jZa5.UERAgLXGDTxhyZLb.NioIFZh42WrAe6K4A18KiXXl0WDfuXW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bars`
--
ALTER TABLE `bars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dessert_id` (`dessert_id`),
  ADD KEY `drink_id` (`drink_id`);

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bars`
--
ALTER TABLE `bars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`dessert_id`) REFERENCES `desserts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`drink_id`) REFERENCES `drinks` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
