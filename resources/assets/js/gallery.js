Dropzone.options.addImages = {
  maxFilesize: 2,
  acceptedFiles: 'image/*',
  success: function(file,response){
    if (file.status == 'success') {
      handleDropzoneFileUpload.handleSuccess(response);
    }else {
      handleDropzoneFileUpload.handleError(response);
    }
  }
}

var handleDropzoneFileUpload = {
  handleError: function(response){
    console.log(response);
  },
  handleSuccess: function(response){
    var imageList  = $('#gallery-images ul');
    var imageSrc = baseURL + '/' + response.file_path;
    imageList.append('<li> <a href="'  + imageSrc + '" data-lightbox="mygallery"> <img src="'  + imageSrc + '" alt="" /> </a> </li>');
  }
}
