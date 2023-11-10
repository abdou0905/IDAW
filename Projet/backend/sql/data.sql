-- --------------------------------------------------------
--
-- Données de la table `aliments`
--
-- --------------------------------------------------------

INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `age`, `taille`, `poids`, `sexe`, `sport`) VALUES
('Patarot', 'Adele', 'ap@imt.fr', 22, 157, 60, 'F', 3);

-- --------------------------------------------------------
--
-- Données de la table `aliments`
--
-- --------------------------------------------------------

-- --------------------------------------------------------
-- Insertion des LEGUMES
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('carotte', 'legume', '41.0', '0.9', '10.1', '0.2', '0.5', '4.7'),
('brocoli', 'legume', '34.0', '2.8', '7.0', '0.4', '0.7', '1.7'),
('tomate', 'legume', '18.0', '0.9', '3.9', '0.2', '0.0', '2.6'),
('epinard', 'legume', '23.0', '2.9', '3.6', '0.4', '0.8', '0.4'),
('poivron', 'legume', '31.0', '1.3', '6.0', '0.3', '0.0', '3.3'),
('courgette', 'legume', '17.0', '1.2', '3.1', '0.3', '0.0', '1.7'),
('chou-fleur', 'legume', '25.0', '1.9', '4.9', '0.3', '0.3', '1.9'),
('aubergine', 'legume', '25.0', '1.0', '6.0', '0.2', '0.0', '2.3'),
('haricot vert', 'legume', '31.0', '1.8', '6.9', '0.2', '0.0', '2.4'),
('concombre', 'legume', '15.0', '0.6', '3.6', '0.2', '0.0', '1.8'),
('radis', 'legume', '16.0', '0.7', '3.4', '0.2', '0.0', '1.9'),
('celeri', 'legume', '16.0', '0.7', '3.4', '0.2', '0.1', '1.3'),
('oignon', 'legume', '40.0', '1.1', '9.3', '0.1', '0.0', '4.2'),
('courge butternut', 'legume', '45.0', '1.0', '12.4', '0.1', '0.0', '2.2'),
('pois', 'legume', '80.0', '5.0', '14.0', '0.3', '0.4', '3.7'),
('aubergine', 'legume', '25.0', '1.0', '6.0', '0.2', '0.0', '2.3'),
('artichaut', 'legume', '47.0', '2.0', '11.0', '0.2', '0.0', '1.0'),
('poireau', 'legume', '61.0', '2.0', '14.0', '0.2', '0.0', '3.2'),
('betterave', 'legume', '43.0', '1.6', '9.6', '0.2', '0.0', '5.5'),
('haricot rouge', 'legume', '333.0', '21.6', '63.0', '1.1', '0.0', '2.3'),
('asperge', 'legume', '20.0', '2.0', '3.0', '0.2', '0.2', '1.0'),
('pois gourmand', 'legume', '42.0', '2.0', '8.0', '0.2', '0.0', '3.0'),
('champignon', 'legume', '22.0', '3.1', '0.1', '0.3', '0.0', '0.2'),
('fenouil', 'legume', '31.0', '1.2', '7.3', '0.2', '0.1', '4.1'),
('citrouille', 'legume', '26.0', '1.0', '6.0', '0.1', '0.0', '3.9'),
('courgette jaune', 'legume', '16.0', '1.0', '4.0', '0.2', '0.0', '2.0'),
('chou kale', 'legume', '49.0', '4.3', '8.8', '0.9', '0.0', '0.0'),
('haricot mungo', 'legume', '347.0', '23.0', '63.0', '1.6', '0.0', '0.0'),
('navet', 'legume', '37.0', '1.0', '8.0', '0.1', '0.0', '0.0'),
('panais', 'legume', '75.0', '1.2', '17.0', '0.3', '0.0', '0.0'),
('cresson', 'legume', '11.0', '2.3', '0.7', '0.1', '0.0', '0.0'),
('salade iceberg', 'legume', '14.0', '0.9', '3.0', '0.1', '0.0', '0.0'),
('radis noir', 'legume', '16.0', '0.7', '3.4', '0.2', '0.1', '0.0'),
('blette', 'legume', '21.0', '2.0', '3.0', '0.3', '0.0', '0.0'),
('chicorée', 'legume', '23.0', '1.0', '5.0', '0.2', '0.0', '0.0');

-- --------------------------------------------------------
-- Insertion des FRUITS
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('pomme', 'fruit', '52.0', '0.3', '14.0', '0.2', '0.0', '10.4'),
('banane', 'fruit', '89.0', '1.1', '22.0', '0.3', '0.0', '12.2'),
('fraise', 'fruit', '32.0', '0.7', '7.7', '0.3', '0.0', '4.9'),
('orange', 'fruit', '43.0', '1.0', '8.2', '0.2', '0.0', '8.2'),
('kiwi', 'fruit', '61.0', '1.1', '14.9', '0.5', '0.0', '9.2'),
('ananas', 'fruit', '50.0', '0.5', '13.1', '0.2', '0.0', '9.9'),
('cerise', 'fruit', '50.0', '1.0', '11.3', '0.4', '0.0', '8.5'),
('raisin', 'fruit', '69.0', '0.7', '18.0', '0.2', '0.0', '16.2'),
('poire', 'fruit', '57.0', '0.4', '15.5', '0.1', '0.0', '9.2'),
('abricot', 'fruit', '43.0', '1.0', '9.0', '0.4', '0.0', '9.0'),
('pamplemousse', 'fruit', '32.0', '0.6', '6.7', '0.2', '0.0', '6.2'),
('framboise', 'fruit', '52.0', '1.5', '9.7', '0.7', '0.0', '4.4'),
('mangue', 'fruit', '60.0', '0.8', '14.0', '0.6', '0.0', '14.3'),
('peche', 'fruit', '39.0', '0.9', '9.5', '0.3', '0.0', '8.2'),
('grenade', 'fruit', '83.0', '1.7', '18.0', '0.7', '0.0', '9.2'),
('myrtille', 'fruit', '57.0', '0.7', '14.0', '0.2', '0.0', '9.2'),
('mandarine', 'fruit', '53.0', '1.0', '13.3', '0.3', '0.0', '9.2'),
('cassis', 'fruit', '43.0', '1.0', '9.0', '0.4', '0.0', '9.0'),
('nectarine', 'fruit', '44.0', '0.9', '9.9', '0.2', '0.0', '9.9'),
('figue', 'fruit', '74.0', '1.3', '19.2', '0.4', '0.0', '16.3'),
('poire williams', 'fruit', '57.0', '0.4', '15.5', '0.1', '0.0', '9.2'),
('prune', 'fruit', '46.0', '0.7', '9.6', '0.3', '0.0', '8.2'),
('groseille', 'fruit', '37.0', '0.8', '7.6', '0.2', '0.0', '7.6'),
('pomelo', 'fruit', '32.0', '0.6', '6.7', '0.2', '0.0', '6.2'),
('kaki', 'fruit', '81.0', '1.0', '18.6', '0.3', '0.0', '15.0'),
('abricot sec', 'fruit', '241.0', '3.4', '62.6', '0.5', '0.0', '51.0'),
('raisin sec', 'fruit', '299.0', '3.1', '79.2', '0.5', '0.0', '59.2'),
('datte', 'fruit', '282.0', '2.5', '75.0', '0.4', '0.0', '63.3'),
('melon', 'fruit', '34.0', '0.9', '8.0', '0.2', '0.0', '8.0'),
('tomate', 'fruit', '18.0', '0.9', '3.9', '0.2', '0.0', '2.6');

-- --------------------------------------------------------
-- Insertion des FECULENTS
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('riz', 'feculent', '130.0', '2.7', '28.7', '0.3', '0.0', '0.1'),
('pates', 'feculent', '131.0', '5.2', '25.4', '1.1', '0.0', '0.4'),
('pain', 'feculent', '265.0', '8.4', '49.5', '2.9', '0.8', '3.7'),
('patate douce', 'feculent', '86.0', '1.6', '20.1', '0.1', '0.0', '4.2'),
('quinoa', 'feculent', '120.0', '4.1', '21.3', '1.9', '0.0', '1.5'),
('pomme de terre', 'feculent', '77.0', '2.0', '17.5', '0.2', '0.0', '0.8'),
('mais', 'feculent', '86.0', '3.2', '19.0', '1.3', '0.0', '3.2'),
('couscous', 'feculent', '112.0', '3.8', '23.2', '0.2', '0.0', '0.1'),
('ble', 'feculent', '329.0', '12.6', '68.0', '1.7', '0.0', '2.0'),
('pomme de terre', 'feculent', '77.0', '2.0', '17.5', '0.2', '0.0', '0.8'),
('haricot rouge', 'feculent', '333.0', '7.3', '63.7', '0.6', '0.0', '2.6'),
('patate douce', 'feculent', '86.0', '1.6', '20.1', '0.1', '0.0', '4.2'),
('pois chiche', 'feculent', '164.0', '8.9', '27.4', '2.6', '0.0', '4.8'),
('avoine', 'feculent', '389.0', '16.9', '66.3', '6.9', '0.0', '0.2'),
('sarrasin', 'feculent', '343.0', '13.3', '71.5', '3.4', '0.0', '0.1'),
('pain burger', 'feculent', '265.0', '8.4', '49.5', '2.9', '0.8', '3.7'),
('wrap', 'feculent', '200.0', '4.0', '35.0', '3.0', '0.6', '1.0'),
('pain pita', 'feculent', '275.0', '9.0', '46.0', '2.5', '0.6', '3.0'),
('pain de mie complet', 'feculent', '247.0', '9.0', '43.0', '2.0', '1.0', '3.0'),
('pain de mie blanc', 'feculent', '260.0', '8.0', '50.0', '2.5', '1.0', '3.0'),
('pain complet aux céréales', 'feculent', '250.0', '8.0', '46.0', '2.5', '0.6', '3.0'),
('pain aux noix', 'feculent', '280.0', '7.0', '48.0', '6.0', '1.0', '5.0'),
('pain de seigle', 'feculent', '230.0', '7.0', '45.0', '2.0', '0.8', '2.0'),
('pommes de terre frites', 'feculent', '365.0', '3.4', '49.0', '17.0', '1.0', '0.0'),
('purée de pommes de terre', 'feculent', '95.0', '2.0', '20.0', '0.3', '0.5', '1.0'),
('pommes de terre au four', 'feculent', '200.0', '2.0', '46.0', '0.3', '0.5', '1.0'),
('frites de patate douce', 'feculent', '285.0', '2.8', '52.0', '7.0', '1.1', '0.0'),
('galettes de riz', 'feculent', '357.0', '6.0', '81.0', '0.9', '0.0', '0.0'),
('polenta', 'feculent', '83.0', '1.3', '18.0', '0.2', '0.0', '0.1'),
('gnocchi', 'feculent', '154.0', '3.4', '29.0', '1.0', '0.3', '0.0'),
('tapioca', 'feculent', '358.0', '0.9', '88.0', '0.2', '0.1', '0.0'),
('pommes de terre rissolées', 'feculent', '130.0', '2.0', '25.0', '2.0', '0.0', '0.0'),
('semoule de maïs', 'feculent', '365.0', '8.0', '76.0', '1.4', '0.0', '0.2'),
('graines de couscous', 'feculent', '176.0', '6.0', '37.0', '0.4', '0.0', '0.0'),
('nouilles de riz', 'feculent', '192.0', '0.4', '45.0', '0.2', '0.0', '0.0');

-- --------------------------------------------------------
-- Insertion des PROTEINES
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('poulet', 'proteine', '165.0', '31.0', '0.0', '3.6', '0.3', '0.0'),
('boeuf', 'proteine', '250.0', '26.0', '0.0', '17.0', '0.1', '0.0'),
('saumon', 'proteine', '206.0', '22.0', '0.0', '13.4', '0.1', '0.0'),
('thon', 'proteine', '144.0', '30.0', '0.0', '1.0', '0.4', '0.0'),
('tofu', 'proteine', '144.0', '15.0', '3.9', '8.0', '0.0', '0.0'),
('lentilles', 'proteine', '116.0', '9.0', '19.0', '0.5', '0.0', '2.0'),
('haricot noir', 'proteine', '339.0', '21.6', '63.0', '1.1', '0.0', '2.3'),
('oeuf', 'proteine', '143.0', '13.0', '1.1', '9.9', '0.4', '1.1'),
('porc', 'proteine', '143.0', '20.0', '0.0', '6.0', '0.0', '0.0'),
('poulet grillé', 'proteine', '165.0', '31.0', '0.0', '3.6', '0.3', '0.0'),
('boeuf haché maigre', 'proteine', '250.0', '26.0', '0.0', '17.0', '0.1', '0.0'),
('saumon grillé', 'proteine', '206.0', '22.0', '0.0', '13.4', '0.1', '0.0'),
('thon en conserve', 'proteine', '144.0', '30.0', '0.0', '1.0', '0.4', '0.0'),
('tofu mariné', 'proteine', '144.0', '15.0', '3.9', '8.0', '0.0', '0.0'),
('lentilles cuites', 'proteine', '116.0', '9.0', '19.0', '0.5', '0.0', '2.0'),
('haricot noir cuit', 'proteine', '339.0', '21.6', '63.0', '1.1', '0.0', '2.3'),
('omelette aux fines herbes', 'proteine', '143.0', '13.0', '1.1', '9.9', '0.4', '1.1'),
('filet de porc grillé', 'proteine', '143.0', '20.0', '0.0', '6.0', '0.0', '0.0'),
('escalope de dinde', 'proteine', '135.0', '29.0', '0.0', '1.0', '0.2', '0.0'),
('jambon cru', 'proteine', '250.0', '26.0', '0.0', '17.0', '2.0', '0.0'),
('saucisson sec', 'proteine', '450.0', '23.0', '1.0', '38.0', '5.0', '0.0'),
('chorizo', 'proteine', '455.0', '22.0', '2.0', '38.0', '6.0', '0.0'),
('jambon fumé', 'proteine', '145.0', '21.0', '0.0', '7.0', '1.0', '0.0'),
('saucisse de Francfort', 'proteine', '290.0', '13.0', '3.0', '25.0', '1.0', '0.0'),
('saucisse italienne', 'proteine', '325.0', '14.0', '3.0', '28.0', '1.0', '0.0'),
('andouille', 'proteine', '345.0', '16.0', '3.0', '29.0', '2.0', '0.0'),
('pastrami', 'proteine', '133.0', '15.0', '0.0', '8.0', '2.0', '0.0'),
('kacki', 'proteine', '320.0', '15.0', '3.0', '28.0', '1.0', '0.0'),
('steak haché', 'proteine', '250.0', '24.0', '0.0', '17.0', '2.0', '0.0'),
('cordon bleu', 'proteine', '320.0', '18.0', '10.0', '21.0', '1.0', '0.0');

-- --------------------------------------------------------
-- Insertion des PRODUITS LAITIERS
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('lait', 'produitLaitier', '42.0', '3.4', '4.7', '1.0', '0.1', '5.1'),
('yaourt', 'produitLaitier', '61.0', '4.0', '5.0', '3.6', '0.1', '4.7'),
('fromage', 'produitLaitier', '356.0', '25.0', '2.0', '28.8', '1.4', '0.0'),
('beurre', 'produitLaitier', '717.0', '0.9', '0.0', '81.0', '2.0', '0.0'),
('creme fraiche', 'produitLaitier', '340.0', '2.0', '3.6', '35.0', '0.0', '3.6'),
('vache qui rit', 'produitLaitier', '314.0', '13.0', '6.0', '24.0', '0.9', '0.1'),
('petit suisse', 'produitLaitier', '55.0', '3.5', '6.0', '1.6', '0.2', '5.0'),
('yaourt grec', 'produitLaitier', '105.0', '6.0', '3.6', '7.8', '0.1', '3.6'),
('lait ecreme', 'produitLaitier', '34.0', '3.4', '4.7', '0.4', '0.1', '5.1'),
('lait de soja', 'produitLaitier', '33.0', '3.4', '1.6', '1.8', '0.0', '0.5'),
('lait damande', 'produitLaitier', '13.0', '0.5', '0.3', '1.1', '0.0', '0.3'),
('lait de noisette', 'produitLaitier', '13.0', '0.5', '0.4', '0.8', '0.0', '0.3'),
('lait de coco', 'produitLaitier', '230.0', '2.0', '4.4', '23.0', '0.0', '4.0'),
('fromage de chevre', 'produitLaitier', '364.0', '21.0', '0.4', '30.0', '1.6', '0.0'),
('fromage blanc', 'produitLaitier', '59.0', '8.0', '3.0', '1.0', '0.1', '3.0'),
('camembert', 'produitLaitier', '299.0', '20.0', '0.0', '24.0', '1.0', '0.0'),
('roquefort', 'produitLaitier', '369.0', '20.0', '2.0', '31.0', '2.0', '0.0'),
('cheddar', 'produitLaitier', '402.0', '25.0', '1.0', '33.0', '2.0', '0.0'),
('gouda', 'produitLaitier', '356.0', '24.0', '1.0', '28.0', '1.0', '0.0'),
('feta', 'produitLaitier', '264.0', '14.0', '4.0', '21.0', '1.0', '1.0'),
('emmental', 'produitLaitier', '380.0', '28.0', '1.0', '30.0', '1.0', '0.0'),
('brie', 'produitLaitier', '334.0', '21.0', '0.0', '28.0', '1.0', '0.0'),
('mozzarella', 'produitLaitier', '280.0', '17.0', '1.0', '23.0', '1.0', '0.0'),
('gruyère', 'produitLaitier', '413.0', '29.0', '2.0', '33.0', '1.0', '0.0'),
('comté', 'produitLaitier', '393.0', '26.0', '1.0', '32.0', '1.0', '0.0'),
('Yaourt Liégeois au chocolat', 'produitLaitier', '160.0', '3.5', '22.0', '7.0', '0.1', '20.0'),
('Yaourt Liégeois au café', 'produitLaitier', '145.0', '4.0', '18.0', '6.0', '0.3', '17.0'),
('Yaourt Danette au caramel', 'produitLaitier', '180.0', '3.0', '27.0', '6.5', '0.2', '24.0'),
('Yaourt Danette au chocolat', 'produitLaitier', '170.0', '3.5', '24.0', '6.0', '0.1', '21.0'),
('Yaourt Danette à la vanille', 'produitLaitier', '160.0', '3.0', '23.0', '6.5', '0.2', '20.0'),
('Yaourt Danette au café', 'produitLaitier', '150.0', '3.5', '20.0', '6.0', '0.3', '18.0');

-- --------------------------------------------------------
-- Insertion des BOISSON
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('cafe', 'boisson', '2.0', '0.1', '0.3', '0.0', '0.0', '0.0'),
('the', 'boisson', '1.0', '0.1', '0.3', '0.0', '0.0', '0.0'),
('jus d\'orange', 'boisson', '43.0', '0.7', '8.2', '0.2', '0.0', '8.2'),
('jus de pomme', 'boisson', '46.0', '0.2', '11.0', '0.2', '0.0', '10.0'),
('soda', 'boisson', '41.0', '0.0', '11.0', '0.0', '0.0', '10.6'),
('biere', 'boisson', '43.0', '0.5', '3.6', '0.0', '0.0', '0.0'),
('vin rouge', 'boisson', '83.0', '0.6', '2.0', '0.0', '0.0', '0.0'),
('vin blanc', 'boisson', '82.0', '0.6', '3.0', '0.0', '0.0', '0.0'),
('cocktail', 'boisson', '150.0', '0.0', '5.0', '0.0', '0.0', '5.0'),
('smoothie', 'boisson', '63.0', '1.0', '15.0', '0.4', '0.0', '12.0'),
('energy drink', 'boisson', '45.0', '0.0', '11.0', '0.0', '0.0', '10.5'),
('limonade', 'boisson', '41.0', '0.0', '11.0', '0.0', '0.0', '10.6'),
('chocolat chaud', 'boisson', '192.0', '4.9', '27.8', '7.2', '0.1', '25.1'),
('sirop a l\'eau', 'boisson', '60.0', '0.0', '16.0', '0.0', '0.0', '16.0');

-- --------------------------------------------------------
-- Insertion des SNACKS SALES
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('chips', 'snackSale', '536.0', '6.6', '48.9', '34.9', '1.1', '0.5'),
('cacahuetes', 'snackSale', '567.0', '25.8', '9.9', '49.7', '0.6', '3.1'),
('popcorn', 'snackSale', '375.0', '9.1', '78.5', '4.3', '0.1', '0.1'),
('pretzels', 'snackSale', '384.0', '8.4', '78.2', '2.0', '2.3', '2.0'),
('nachos', 'snackSale', '475.0', '9.2', '69.3', '20.7', '1.8', '0.9'),
('bretzels', 'snackSale', '351.0', '9.1', '74.3', '1.6', '1.2', '1.5'),
('cheetos', 'snackSale', '536.0', '6.6', '48.9', '34.9', '1.1', '0.5'),
('crackers', 'snackSale', '502.0', '7.4', '60.2', '26.0', '1.4', '5.0'),
('pizza surgelee', 'snackSale', '285.0', '10.3', '33.8', '11.1', '1.4', '3.5'),
('nuggets de poulet', 'snackSale', '264.0', '14.9', '16.2', '16.4', '0.8', '0.2'),
('frites', 'snackSale', '365.0', '3.4', '63.0', '15.0', '0.7', '0.4'),
('saucisses cocktail', 'snackSale', '305.0', '7.0', '0.9', '30.0', '1.2', '0.5'),
('pringles', 'snackSale', '524.0', '4.2', '50.6', '34.0', '1.0', '0.5'),
('fruits secs', 'snackSale', '349.0', '6.9', '52.3', '14.1', '0.0', '31.0');

-- --------------------------------------------------------
-- Insertion des SNACKS SUCRES
-- --------------------------------------------------------
INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('chocolat', 'snackSucre', '546.0', '5.4', '59.0', '31.0', '0.0', '55.0'),
('bonbons', 'snackSucre', '394.0', '0.9', '97.6', '0.2', '0.2', '69.0'),
('biscuits', 'snackSucre', '479.0', '6.1', '66.0', '21.0', '0.6', '34.0'),
('gateau', 'snackSucre', '361.0', '4.2', '64.0', '9.0', '0.4', '41.0'),
('glace', 'snackSucre', '207.0', '3.0', '27.0', '10.0', '0.1', '24.0'),
('muffin', 'snackSucre', '265.0', '3.0', '49.0', '7.0', '0.3', '28.0'),
('donuts', 'snackSucre', '452.0', '4.9', '56.0', '23.0', '0.5', '31.0'),
('barre de chocolat', 'snackSucre', '515.0', '5.4', '58.0', '28.0', '0.0', '51.0'),
('caramel', 'snackSucre', '394.0', '0.9', '97.6', '0.2', '0.2', '69.0'),
('brioche', 'snackSucre', '317.0', '6.2', '50.0', '11.0', '0.6', '16.0'),
('barre granola', 'snackSucre', '367.0', '5.9', '62.0', '11.0', '0.3', '24.0'),
('beignet', 'snackSucre', '298.0', '3.4', '36.0', '15.0', '0.2', '15.0'),
('churros', 'snackSucre', '498.0', '4.0', '65.0', '24.0', '0.4', '35.0'),
('cereales', 'snackSucre', '379.0', '7.5', '82.0', '1.5', '0.8', '30.0'),
('pâte à tartiner', 'snackSucre', '541.0', '6.2', '56.0', '30.0', '0.0', '55.0');

-- --------------------------------------------------------
--
-- Données de la table `repas`
--
-- --------------------------------------------------------

INSERT INTO `repas` (`date`, `type`) VALUES
('2023-11-10', 'petitDejeuner'),
('2023-11-10', 'dejeuner'),
('2023-11-10', 'gouter'),
('2023-11-10', 'diner'),
('2023-11-11', 'petitDejeuner'),
('2023-11-11', 'dejeuner'),
('2023-11-11', 'gouter'),
('2023-11-11', 'diner'),
('2023-11-12', 'petitDejeuner'),
('2023-11-12', 'dejeuner'),
('2023-11-12', 'gouter'),
('2023-11-12', 'diner'),
('2023-11-13', 'petitDejeuner'),
('2023-11-13', 'dejeuner'),
('2023-11-13', 'gouter'),
('2023-11-13', 'diner'),
('2023-11-14', 'petitDejeuner'),
('2023-11-14', 'dejeuner'),
('2023-11-14', 'gouter'),
('2023-11-14', 'diner'),
('2023-11-15', 'petitDejeuner'),
('2023-11-15', 'dejeuner'),
('2023-11-15', 'gouter'),
('2023-11-15', 'diner'),
('2023-11-16', 'petitDejeuner'),
('2023-11-16', 'dejeuner'),
('2023-11-16', 'gouter'),
('2023-11-16', 'diner');

-- --------------------------------------------------------
--
-- Données de la table `repas_aliments`
--
-- --------------------------------------------------------
-- Petit déjeuner (ID repas 1)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite) VALUES
(163, 1, 250),
(37, 1, 150),
(132, 1, 200);

-- Déjeuner (ID repas 2)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite) VALUES
(67, 2, 200),
(1, 2, 100),
(102, 2, 150),
(163, 2, 300);

-- Goûter (ID repas 3)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(177, 3, 50);

-- Dîner (ID repas 4)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(75, 4, 200),
(15, 4, 150),
(110, 4, 200),
(167, 4, 250);

-- Petit déjeuner (ID repas 5)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(164, 5, 250),
(42, 5, 150),
(160, 5, 200);

-- Déjeuner (ID repas 6)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(90, 6, 200),
(30, 6, 100),
(120, 6, 150),
(167, 6, 300);

-- Goûter (ID repas 7)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(195, 7, 50); 

-- Dîner (ID repas 8)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(70, 8, 200), 
(25, 8, 150),
(109, 8, 200),
(165, 8, 250);

-- Petit déjeuner (ID repas 9)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(164, 9, 250),
(46, 9, 150),
(145, 9, 200);

-- Déjeuner (ID repas 10)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(72, 10, 200),
(6, 10, 100),
(128, 10, 150), 
(170, 10, 300);

-- Goûter (ID repas 11)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(198, 11, 50);

-- Dîner (ID repas 12)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(73, 12, 200),
(21, 12, 100), 
(113, 12, 150), 
(165, 12, 250);

-- Petit déjeuner (ID repas 13)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(165, 13, 250),
(50, 13, 150),
(79,13,80);

-- Déjeuner (ID repas 14)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(71, 14, 200),
(5, 14, 100), 
(127, 14, 150);

-- Goûter (ID repas 15)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(191, 15, 50);

-- Dîner (ID repas 16)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(76, 16, 200),
(12, 16, 100),
(116, 16, 150),
(163, 16, 250);

-- Petit déjeuner (ID repas 17)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(166, 17, 250),
(57, 17, 150),
(154, 17, 200);

-- Déjeuner (ID repas 18)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(78, 18, 200),
(8, 18, 100),
(129, 18, 150),
(173, 18, 300);

-- Goûter (ID repas 19)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(197, 19, 50);

-- Dîner (ID repas 20)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(80, 20, 200),
(18, 20, 100),
(122, 20, 150),
(175, 20, 250);

-- Petit déjeuner (ID repas 21)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(168, 21, 250),
(62, 21, 150),
(158, 21, 200);

-- Déjeuner (ID repas 22)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(85, 22, 200),
(22, 22, 100),
(123, 22, 150),
(176, 22, 300);

-- Goûter (ID repas 23)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(199, 23, 50);

-- Dîner (ID repas 24)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(87, 24, 200),
(29, 24, 100),
(114, 24, 150),
(168, 24, 250);

-- Petit déjeuner (ID repas 25)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(170, 25, 250),
(68, 25, 150),
(162, 25, 200);

-- Déjeuner (ID repas 26)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(93, 26, 200),
(36, 26, 100),
(125, 26, 150), 
(164, 26, 300);

-- Goûter (ID repas 27)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(194, 27, 50);

-- Dîner (ID repas 28)
INSERT INTO repas_aliment (id_aliment, id_repas, quantite)
VALUES
(94, 28, 200),
(41, 28, 100),
(119, 28, 150),
(171, 28, 250);






