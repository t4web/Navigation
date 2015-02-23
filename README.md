# Navigation
ZF2 Module which simplifies creating and viewing menus

## Usage
Add Navigation repo in yours require in composer.json:
```json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/t4web/navigation.git"
    }
],
"require": {
    "t4web/navigation": "dev-master"
}
```
In your project, for example in modules/Application/Module.php, you can add Navigation service:
```php
'factories' => array(
      'UserNavigation' => function (ServiceLocatorInterface $sl) {
          $factory =  new Navigation\Factory();
          return $factory->createService($sl);
      },
  )
```
In your BootstrapListener you can add menu entries:
```php
public function onBootstrap(EventInterface $e)
{
    $sl = $e->getApplication()->getServiceLocator();
    $navigarot = $sl->get('Navigation\Menu\Navigator');
    $navigator->add(new Navigation\Menu\Entry('Dashboard', 'home', 'fa fa-dashboard'));
    $navigator->add(new Navigation\Menu\Entry('Employees', 'employees-list', 'fa fa-users'));
    $navigator->add(new Navigation\Menu\Entry(TITLE, ROUTE, ENTRY_ICON_CLASS));
}
```
where `TITLE` - title in meny entry, `ROUTE` - route from module config, `ENTRY_ICON_CLASS` - class for &lt;i&gt; tag.

After this you can add in your layout menu rendering:
```php
<?= $this->navigation('UserNavigation')
    ->menu()->setUlClass('navigation')
    ->setPartial('partial/navigation'); ?>
```
will be render:
```html
<ul class="navigation">
    <li>
        <a href="/"><i class="fa fa-dashboard"></i><span class="mm-text">Dashboard</span></a>
    </li>
    <li class="active">
        <a href="/employees"><i class="fa fa-users"></i><span class="mm-text">Employees</span></a>
    </li>
</ul>
```
