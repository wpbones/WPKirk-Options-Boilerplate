<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->
<?php ob_start();
$eval = ['eval' => true, 'extract' => ['plugin' => $plugin]];
$evalNoDetails = ['eval' => 'execute', 'extract' => ['plugin' => $plugin]];
$evalJson = array_merge($eval, ['language-eval' => 'json']);
?>

<div class="wp-kirk wrap wp-kirk-sample">

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Overview', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('You can define the plugin options in the `options.php` file.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("@/config/options.php") ?>

    <p>
      <?php wpkirk_md(__('You can always access the plugin instance by using the `$plugin` variable.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo \$plugin->options;", $evalJson) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Get options', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('You can get the options by using the `dot` notation.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo \$plugin->options->get('General.option_2');", $eval); ?>

    <p>
      <?php wpkirk_md(__('You can also store `null` values.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$value = \$plugin->options->get('General.option_5'); echo is_null(\$value) ? 'null' : \$value;", $eval); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Get options by an array', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('You may also retrieve an option sub-branch as an `Array`.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo var_export(\$plugin->options->get('General'), true);", $eval); ?>

    <p>
      <?php wpkirk_md(__('as well as', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo var_export(\$plugin->options->get('General.option_3'), true);", $eval); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Get option directly', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('You can also get the options without using the `get` method.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo var_export(\$plugin->options['General.option_3'], true);", $eval); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Get default value', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('Of course, you can also get the default value if the option does not exist.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo \$plugin->options->get('General.doNotExists', 'default_value');", $eval); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Add new option', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('You can add a new option by using the `set` method.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo \$plugin->options->set('Special.NewValue', 'myValue');", $eval); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson) ?>

    <p>
      <?php wpkirk_md(__('You can also add new entry options with `null` value.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options->set('Special.NullValue', null);", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson) ?>

    <p>
      <?php wpkirk_md(__('Of course, you can also add a new option by using the `Array` notation.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options['Special.Fullname'] = 'Montgomery Scott';", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson) ?>

    <p>
      <?php wpkirk_md(__('Of course, you can also add a new option starting from the root.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options['what-you-like'] = 'Simply is best';", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Update an option', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('You can update any option and branch tree in the same way, by using the dot notation', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo \$plugin->options->set('Special.Name', 'John');", $eval); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

    <p>
      <?php wpkirk_md(__('By using the `Array` notation', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options['Special.Name'] = 'Sulu';", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

    <p>
      <?php wpkirk_md(__('You can also change the type of the value.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options['Special.Name'] = ['Sulu', 'Kirk'];", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Mass insert and update', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('In accordance with the options structure, you may also update a whole subset of options instead of changing
          them individually.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options->update([
  'General' => [
      'option_4' => [
          'color' => 'red',
          'background' => 'transparent',
          'images' => null
      ],
  ],
]);", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

    <p>
      <?php wpkirk_md(__('Of course, you may use the mass feature for the insert as well', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options->update([
  'General' => [
    'option_5' => [
        'color' => 'red',
        'background' => 'transparent',
        'images' => null
    ],
  ],
]);", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Delete option', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('To delete an option, you have to use the `delete` method.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options->delete('General.option_4');", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Delete all', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('Finally, you can delete all options.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options->delete();", $evalNoDetails); ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Reset', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('Don\'t worry, you can reset the options to the default values.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("\$plugin->options->reset();", $evalNoDetails);  ?>
    <?php wpkirk_code("echo \$plugin->options;", $evalJson); ?>

  </div>

  <?php wpkirk_toc('Options')
  ?>

</div>