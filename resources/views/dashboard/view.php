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
      <?php wpkirk_md(__('Here you can try the ability to handle a form for the options.', 'wp-kirk')); ?>
    </p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Menus', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('In the `menus.php` file you can define the menu items.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("@/config/menus.php", ['line-numbers' => true, 'line' => '36']) ?>

    <p>
      <?php wpkirk_md(__('At line `36` we have the `post` menu item route which will be used to handle the form update.', 'wp-kirk')); ?>
    </p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Controller', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('In the `OptionViewController.php` file you will find the method `saveOptions` which will handle the form submission.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("@/plugin/Http/Controllers/Options/OptionViewController.php", ['line-numbers' => true]) ?>

    <p>
      <?php wpkirk_md(__('We will use the `verifyNonce()` method to verify the nonce.', 'wp-kirk')); ?>
    </p>
    <p>
      <?php wpkirk_md(__('And we will use the `getAsOptions()` method to get the form fields as options.', 'wp-kirk')); ?>
    </p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('View Form', 'wp-kirk')); ?>



    <p>
      <?php wpkirk_md(__('Here we\'re using a very useful HTML markup to display and handle the form fields. First of all, we are going to set up the nonce field.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("wp_nonce_field('Options');") ?>

    <p>
      <?php wpkirk_md(__('Then we will use `$feedback` injected variable to display a message if the form was submitted.', 'wp-kirk')); ?>
    </p>

    <p>
      <?php wpkirk_md(__('We will use a `div` with class `updated notice is-dismissible` to display the message on the top of the page.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code('&#x3C;?php if (isset($feedback)): ?&#x3E;
  &#x3C;div id=&#x22;message&#x22; class=&#x22;updated notice is-dismissible&#x22;&#x3E;
    &#x3C;p&#x3E;
      &#x3C;?php echo $feedback; ?&#x3E;
    &#x3C;/p&#x3E;
  &#x3C;/div&#x3E;
&#x3C;?php endif; ?&#x3E;

&#x3C;form action=&#x22;&#x22; method=&#x22;post&#x22;&#x3E;

  &#x3C;?php wp_nonce_field(&#x27;Options&#x27;); ?&#x3E;

  &#x3C;p&#x3E;
    &#x3C;label for=&#x22;General/option_1&#x22;&#x3E;General.option_1&#x3C;/label&#x3E;
    &#x3C;input type=&#x22;hidden&#x22; name=&#x22;General/option_1&#x22; value=&#x22;false&#x22; /&#x3E;
    &#x3C;input type=&#x22;checkbox&#x22; name=&#x22;General/option_1&#x22; id=&#x22;General/option_1&#x22; &#x3C;?php checked(
        &#x27;true&#x27;,
        $plugin-&#x3E;options-&#x3E;get(&#x27;General.option_1&#x27;)
    ); ?&#x3E;
    value=&#x22;true&#x22;/&#x3E;
  &#x3C;/p&#x3E;

  &#x3C;p&#x3E;
    &#x3C;label for=&#x22;General/option_2&#x22;&#x3E;General.option_2&#x3C;/label&#x3E;
    &#x3C;input type=&#x22;hidden&#x22; name=&#x22;General/option_2&#x22; value=&#x22;false&#x22; /&#x3E;
    &#x3C;input type=&#x22;checkbox&#x22; name=&#x22;General/option_2&#x22; id=&#x22;General/option_2&#x22; &#x3C;?php checked(
        &#x27;true&#x27;,
        $plugin-&#x3E;options-&#x3E;get(&#x27;General.option_2&#x27;)
    ); ?&#x3E;
    value=&#x22;true&#x22;/&#x3E;
  &#x3C;/p&#x3E;

  &#x3C;p&#x3E;
    &#x3C;label for=&#x22;Special/Name&#x22;&#x3E;Special.Name&#x3C;/label&#x3E;
    &#x3C;input type=&#x22;text&#x22; name=&#x22;Special/Name&#x22; id=&#x22;Special/Name&#x22;
      value=&#x22;&#x3C;?php echo $plugin-&#x3E;options-&#x3E;get(&#x27;Special.Name&#x27;); ?&#x3E;&#x22; /&#x3E;

  &#x3C;/p&#x3E;

  &#x3C;p&#x3E;
    &#x3C;label for=&#x22;General/option_3/sub_option_of_3&#x22;&#x3E;General/option_3/sub_option_of_3&#x3C;/label&#x3E;
    &#x3C;input type=&#x22;text&#x22; name=&#x22;General/option_3/sub_option_of_3&#x22; id=&#x22;General/option_3/sub_option_of_3&#x22;
      value=&#x22;&#x3C;?php echo $plugin-&#x3E;options-&#x3E;get(
          &#x27;General.option_3.sub_option_of_3&#x27;
      ); ?&#x3E;&#x22; /&#x3E;

  &#x3C;/p&#x3E;

  &#x3C;button class=&#x22;button button-primary&#x22;&#x3E;Update&#x3C;/button&#x3E;

&#x3C;/form&#x3E;'); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Try it', 'wp-kirk')); ?>

    <?php if (isset($feedback)): ?>
      <div id="message" class="updated notice is-dismissible">
        <p>
          <?php echo $feedback; ?>
        </p>
      </div>
    <?php endif; ?>

    <form action="" method="post">

      <?php wp_nonce_field('Options'); ?>

      <p>
        <label for="General/option_1">General.option_1</label>
        <input type="hidden" name="General/option_1" value="false" />
        <input type="checkbox" name="General/option_1" id="General/option_1" <?php checked(
                                                                                'true',
                                                                                $plugin->options->get('General.option_1')
                                                                              ); ?>
          value="true" />
      </p>

      <p>
        <label for="General/option_2">General.option_2</label>
        <input type="hidden" name="General/option_2" value="false" />
        <input type="checkbox" name="General/option_2" id="General/option_2" <?php checked(
                                                                                'true',
                                                                                $plugin->options->get('General.option_2')
                                                                              ); ?>
          value="true" />
      </p>

      <p>
        <label for="Special/Name">Special.Name</label>
        <input type="text" name="Special/Name" id="Special/Name"
          value="<?php echo $plugin->options->get('Special.Name'); ?>" />

      </p>

      <p>
        <label for="General/option_3/sub_option_of_3">General/option_3/sub_option_of_3</label>
        <input type="text" name="General/option_3/sub_option_of_3" id="General/option_3/sub_option_of_3"
          value="<?php echo $plugin->options->get(
                    'General.option_3.sub_option_of_3'
                  ); ?>" />

      </p>

      <button class="button button-primary">Update</button>

    </form>

    <p>
      <?php wpkirk_md(__('The current options are:', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("echo \$plugin->options;", $evalJson) ?>

  </div>

  <?php wpkirk_toc('Options View')
  ?>

</div>