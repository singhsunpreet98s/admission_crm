var loader = {
   template: `<div class="loader_backdrop"><div class="d-flex justify-content-center">
        <div class="loader"></div>
</div></div>`,
   add: function ($container) {
      $container = $($container);

      dd('loader.add', $container);

      if ($('.loader_backdrop', $container).length)
         return;

      $container.css('position', 'relative');
      $container.append(loader.template);
   },
   remove: function ($container) {
      $container = $($container);
      dd('loader.remove', $container);
      $('.loader_backdrop', $container).remove();
   }
};
