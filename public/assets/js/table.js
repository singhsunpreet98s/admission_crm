$.ajaxSetup({ cache: false });

var tables = {
   loader: '',
   config: {},
   items_arr: {},

   getFilters: function (table) {
      var $tableContainer = $("#" + table),
         $filters = $('[data-filter]', $tableContainer),
         filter = {};

      if ($filters.length) {

         $filters.each(function (index) {
            var type = $(this).attr('type');

            switch (type) {
               case 'checkbox':
               case 'radio':
                  if (!$(this).is(':checked'))
                     return true;
                  break;
               default:
                  break;
            }

            filter[$(this).attr('name')] = $(this).val();
         });
      }

      return filter;
   },

   get: function (table, url) {
      var config = tables.config[table];
      if (typeof config === 'undefined') {
         alert('"' + table + '" configs is not defined!');
      }

      if (typeof url === 'undefined') {
         url = config.currentUrl;
      }

      if (typeof url === 'undefined') {
         url = config.url;
      }

      if (typeof url !== 'undefined') {
         tables.config[table].currentUrl = url;
      }

      var $tableContainer = $("#" + table),
         $table = $('[data-table]', $tableContainer),
         filter = {};

      filter = tables.getFilters(table);
      $.ajax({
         type: "GET",
         dataType: "html",
         url: url,
         cache: false,
         data: filter,
         beforeSend: function () {
            loader.add($tableContainer);
         },
         success: function (res) {
            $table.html(res);

            if (!config.withoutData)
               tables.check_checkboxes(table);
            initComponents($table);
         },
         complete: function () {
            loader.remove($tableContainer);
         },
         error: function (jqXHR, textStatus, errorThrown) {
            dd('table.get.fail', jqXHR);
            handlerFailTarget(jqXHR, textStatus, errorThrown, $table);
         }
      });
   },

   reload: function (table) {
      if (typeof tables.config[table] === 'undefined') {
         alert('"' + table + '" configs is not defined!');
      }

      tables.get(table, tables.config[table].url);
   },

   set_config: function (table, configs) {
      dd('tables.set_config');

      if (typeof tables.config[table] === 'undefined') {
         tables.config[table] = configs;
      } else {
         for (var key in configs) {
            if (configs.hasOwnProperty(key)) {
               tables.config[table][key] = configs[key]
            }
         }
      }

   },

   check_checkboxes: function (table) {
      if (typeof tables.items_arr[table] == 'undefined') {
         tables.items_arr[table] = [];
      }
      $("#" + table + " input:checkbox").not(":disabled").each(function () {
         var id = $(this).val();
         if (id && id != 'on') {
            if (tables.items_arr[table].indexOf(id) > -1) {
               if (!$(this).is(":checked")) {
                  $(this).prop("checked", true);
               }
            }
            else {
               if ($(this).is(":checked")) {
                  $(this).prop("checked", false);
               }
            }
         }
      });
   },

};

$(document).ready(function () {

   $(document).on('click', '.js-confirm-link', function (e) {
      var url = $(this).attr('href');
      var text = $(this).data('confirm');
      $('#js-confirm-link .modal-body').html(text);
      var method = $(this).data('method');
      var data = $(this).data();
      var table = $(this).closest('[data-table]').closest('[id]');
      var callback = $(this).data('callback');
      e.preventDefault();
      $('#js-confirm-link').modal({ backdrop: 'static', keyboard: false })
         .one('click', '.js-confirm-link-yes', function (e) {
            if (method == 'DELETE' || method == 'POST') {
               if (method == 'DELETE')
                  data['_method'] = 'DELETE';
               $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: url,
                  cache: false,
                  data: data,
                  success: function (res) {
                     $('#js-confirm-link').modal('hide');
                     if (table.length) {
                        tables.get(table.attr('id'));
                     }

                     if (typeof callback !== 'undefined') {
                        eval(callback);
                     }
                  }
               });
            }
            else {
               window.location = url;
            }
         });
   });

});
