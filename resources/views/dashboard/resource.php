<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->
<?php ob_start();
$eval = ['eval' => true, 'extract' => ['plugin' => $plugin, 'method' => $method]];
$evalNoDetails = ['eval' => 'execute', 'extract' => ['plugin' => $plugin]];
$evalJson = array_merge($eval, ['language-eval' => 'json']);
?>

<div class="wp-kirk wrap wp-kirk-sample">

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Overview', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('Here we are going to use the resource approach to handle the form submission.', 'wp-kirk')); ?>
    </p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Menus', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('In the `menus.php` file you can define the menu items.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("@/config/menus.php", ['line-numbers' => true, 'line' => '43-44']) ?>

    <p>
      <?php wpkirk_md(__('At line `43` and `44` we have defined the `load` and `resource`menu item routes.', 'wp-kirk')); ?>
    </p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Controller', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('In the `OptionResourceController.php` file you will find several methods to handle the form submission.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("@/plugin/Http/Controllers/Options/OptionResourceController.php") ?>

    <!-- ----------------------------------------------------- -->
    <?php $mid = wpkirk_section(__('Method', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('We can use the `$method` injected variable to display the current method.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code(
      htmlentities('<form action="" method="post">
  <button class="button">POST</button>
</form>
<form action="" method="post">
  <input type="hidden" name="_method" value="PUT">
  <button class="button">PUT</button>
</form>
<form action="" method="post">
  <input type="hidden" name="_method" value="PATCH">
  <button class="button">PATCH</button>
</form>
<form action="" method="post">
  <input type="hidden" name="_method" value="DELETE">
  <button class="button">DELETE</button>
</form>
<form action="" method="post">
  <input type="hidden" name="_redirect" value="https://wpbones.com">
  <button class="button">POST with redirect</button>
</form>'),
      ['language' => 'html']
    ) ?>

    <?php wpkirk_code("echo !isset(\$method) ?: \$method;", $eval) ?>

    <div style="display: flex; gap: 8px">
      <form action="#<?php echo $mid ?>" method="post">
        <button class="button">POST</button>
      </form>
      <form action="#<?php echo $mid ?>" method="post">
        <input type="hidden" name="_method" value="PUT">
        <button class="button">PUT</button>
      </form>
      <form action="#<?php echo $mid ?>" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <button class="button">PATCH</button>
      </form>
      <form action="#<?php echo $mid ?>" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <button class="button">DELETE</button>
      </form>
      <form action="#<?php echo $mid ?>" method="post">
        <input type="hidden" name="_redirect" value="https://wpbones.com">
        <button class="button">POST with redirect</button>
      </form>
    </div>

  </div>

  <?php wpkirk_toc('Options Resource')
  ?>

</div>