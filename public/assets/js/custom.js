function sendAjax(url, method = 'GET', data, loadingContainer, section) {
   $.ajax({
      url: url,
      type: method,
      data: data,
      beforeSend: function () {
         loader.add(loadingContainer);
      },
      success: function (response) {
         section.html(response);
      },
      error: function (xhr) {
         toastr.error("It looks like something went wrong", "Error");
      },
      complete: function () {
         loader.remove(loadingContainer);
      }
   });
}