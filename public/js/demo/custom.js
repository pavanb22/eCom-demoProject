function handleFileSelect (evt) {
    // Loop through the FileList and render image files as thumbnails.
    for (const file of evt.target.files) {
      
      // Render thumbnail.
      const span = document.createElement('span')
      const src = URL.createObjectURL(file)
      span.innerHTML = 
        `<img src="${src}" title="${escape(file.name)}" height="300" width="300">`

      document.getElementById('list').insertBefore(span, null)
    }
  }
  
  document.getElementById('product_img').addEventListener('change', handleFileSelect, false);