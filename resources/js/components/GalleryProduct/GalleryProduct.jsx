import React, { useState, useEffect } from "react";
import ReactDOM from 'react-dom/client';
import ReactPlayer from "react-player";

const ImageGallery = () => {
  const [productData, setProductData] = useState([]);
  const [mainImg, setMainImg] = useState("");
  const [isVideo, setIsVideo] = useState(false);

  useEffect(() => {
    const productId = window.productId;
    fetchProduct(productId);
  }, []);

  const fetchProduct = async (productId) => {
    try {
      const response = await fetch(`http://localhost:8000/clientShow/${productId}`);
      const data = await response.json();
      setProductData(data);
      console.log(data)
      setMainImg(`${data.photos[0].url}`);
    } catch (error) {
      console.error(error);
    }
  };
  const handleClick = (event) => {
    const active = document.querySelector(".active");
    if (active) {
      active.classList.remove("active"); // Remove the "active" class from any previously active element
    }
    if (event.currentTarget.classList) {
      event.currentTarget.classList.add("active"); // Add the "active" class to the clicked element
    }
    let mainSrc = event.currentTarget.src; // Set the default image source as the "url" attribute of the clicked element
    const video = event.currentTarget.querySelector("video"); // Get the "video" element inside the clicked "thumbnail" element
    if (video) { // Check if the "video" element exists before trying to access its "src" property
      mainSrc = video.src; // Use the source of the clicked video as the new main image
      setIsVideo(true);
    } else {
      setIsVideo(false);
    }
    setMainImg(mainSrc); // Update the state to set the new main image or video
  };

  const handleMouseOver = (event) => {
    // Obtener las coordenadas del mouse en relación con la imagen
    let rect = event.target.getBoundingClientRect();
    let x = event.clientX - rect.left;
    let y = event.clientY - rect.top;

    // Calcular el factor de zoom
    const zoomFactor = 3;

    // Crear un elemento para mostrar la imagen ampliada
    const zoomedImage = document.createElement("div");
    zoomedImage.style.position = "absolute";
    zoomedImage.style.left = `${event.pageX + 10}px`;
    zoomedImage.style.top = `${event.pageY + 10}px`;
    zoomedImage.style.width = `${rect.width / (zoomFactor * 2)}px`;
    zoomedImage.style.height = `${rect.height / (zoomFactor * 2)}px`;
    zoomedImage.style.backgroundImage = `url(${event.target.src})`;
    zoomedImage.style.backgroundSize = `${rect.width * zoomFactor}px ${rect.height * zoomFactor}px`;
    zoomedImage.style.backgroundPositionX = `${-x * zoomFactor + (zoomedImage.offsetWidth / 2)}px`;
    zoomedImage.style.backgroundPositionY = `${-y * zoomFactor + (zoomedImage.offsetHeight / 2)}px`;
    zoomedImage.style.border = "1px solid black";
    document.body.appendChild(zoomedImage);

    // Actualizar la posición del fondo de la imagen ampliada cuando el mouse se mueve
    event.target.addEventListener("mousemove", (event) => {
      rect = event.target.getBoundingClientRect();
      x = event.clientX - rect.left;
      y = event.clientY - rect.top;
      zoomedImage.style.backgroundPositionX = `${-x * zoomFactor + (zoomedImage.offsetWidth / 2)}px`;
      zoomedImage.style.backgroundPositionY = `${-y * zoomFactor + (zoomedImage.offsetHeight / 2)}px`;
      zoomedImage.style.left = `${event.pageX + 10}px`;
      zoomedImage.style.top = `${event.pageY + 15}px`;
      zoomedImage.style.borderRadius = '30%'
    });

    // Recalcular la posición del elemento cuando se hace scroll en la página
    const handleScroll = () => {
      rect = event.target.getBoundingClientRect();
      x = event.clientX - rect.left;
      y = event.clientY - rect.top;
      zoomedImage.style.left = `${event.pageX + 10}px`;
      zoomedImage.style.top = `${event.pageY + window.scrollY + 10}px`;
    };

    window.addEventListener("scroll", handleScroll);

    // Eliminar el elemento cuando el mouse sale de la imagen
    event.target.addEventListener("mouseout", () => {
      document.body.removeChild(zoomedImage);
      window.removeEventListener("scroll", handleScroll);
    });
  };

  return (
    <div className="containerImageGallery">
      <div className="img_container">
        {isVideo ? (
          <video src={mainImg} className="main_img mainvideo" controls></video>
        ) : (
          <img src={mainImg} alt="" className="main_img" onMouseOver={handleMouseOver} />
        )}
      </div>
      <div className="thumbnail_container">
        {productData.photos && productData.photos.map((image) => (
          <img
            key={image.product_id}
            src={`${image.url}`}
            className={`thumbnail ${image.url === mainImg && "active"}`}
            onClick={handleClick}
          />
        ))}
        {productData.videos && productData.videos.map((video) => (
          <ReactPlayer
            key={video.product_id} // Agregamos una clave única para cada video
            url={`${video.url}`}
            playing={mainImg === `${video.url}`} // Reproducir solo si es el video principal
            className={`thumbnail ${mainImg === video.url && "active"}`}
            onClick={handleClick}
          />
        ))}
      </div>
    </div>
  );
};

export default ImageGallery;

const rootElement = document.getElementById('imageGallery');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<ImageGallery />);
}