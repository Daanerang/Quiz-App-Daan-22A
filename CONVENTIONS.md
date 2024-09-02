### **Laravel Codeconventies**

#### 1. **Bestandsstructuur**

* Houd je aan de standaard Laravel mappenstructuur.
* Plaats models in de `app/Models` directory (indien je `--models-directory` gebruikt).
* Plaats controllers in de `app/Http/Controllers` directory.
* Gebruik een `Services` of `Actions` map voor complexe logica die niet in controllers of models past.

#### 2. **Naming Conventions**

* **Classes** : Gebruik PascalCase (bv. `UserController`, `OrderService`).
* **Methoden en functies** : Gebruik camelCase (bv. `getUserById()`, `storeOrder()`).
* **Variabelen** : Gebruik camelCase (bv. `$userName`, `$totalAmount`).
* **Database tabellen** : Gebruik meervoud en underscore_notation (bv. `users`, `order_items`).
* **Database kolommen** : Gebruik enkelvoud en underscore_notation (bv. `first_name`, `created_at`).
* **Environment variabelen** : Gebruik UPPER_SNAKE_CASE (bv. `DB_HOST`, `APP_ENV`).

#### 3. **Commentaar**

* Gebruik PHPDoc voor methoden en klassen.
* Schrijf inline commentaar voor complexe of niet-intuïtieve stukken code.
* Gebruik geen commentaar voor vanzelfsprekende code, schrijf liever duidelijke code.

#### 4. **Indentatie en Witruimte**

* Gebruik 4 spaties voor indentatie.
* Gebruik witregels om logische blokken te scheiden.
* Voeg een lege regel toe aan het einde van elk bestand.

#### 5. **Controllers**

* Houd controllers lean en mean, met alleen de nodige logica om requests af te handelen.
* Verplaats complexe logica naar services, repositories of andere klassen.

#### 6. **Models**

* Houd modellen klein en richt ze op database interacties.
* Gebruik `accessors` en `mutators` voor specifieke logica rond attribuutmanipulatie.
* Vermijd businesslogica in modellen.

#### 7. **Routes**

* Gebruik resourceful routes waar mogelijk.
* Gebruik naamgeving voor routes (`name`) om duidelijke referenties in de applicatie te houden.
* Plaats routes in de relevante route-bestanden (`web.php`, `api.php`).

#### 8. **Testing**

* Schrijf tests voor elke nieuwe feature of bugfix.
* Gebruik `Arrange-Act-Assert` patroon binnen tests.
* Houd tests klein en gericht op één enkel gedrag.

#### 9. **Configuratie**

* Gebruik de `.env` file voor gevoelige en omgevingsafhankelijke configuraties.
* Houd `.env` file schoon door alleen noodzakelijke configuraties op te nemen.

#### 10. **Code Stijl**

* Gebruik de PSR-12 coding standard als basis.
* Gebruik Laravel's `php artisan format` om code te formatteren volgens de conventies.
