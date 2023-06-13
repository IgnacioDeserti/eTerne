import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom/client';

const Loader = () => {
  const [showVideo, setShowVideo] = useState(false);
  const [showImage, setShowImage] = useState(true);

  useEffect(() => {
    const loader = document.getElementById("loader-wrapper");
    const content = document.getElementById("content-wrapper");

    if (document.cookie.indexOf("visited") >= 0) {
      // El usuario ha visitado antes, muestra la imagen
      setShowVideo(false);
      setTimeout(() => {
        setShowImage(false);
        loader.style.display = "none";
        content.classList.remove("hidden");
      }, 1500);
    } else {
      // Esta es la primera visita del usuario, establece una cookie para rastrear visitas futuras
      document.cookie = "visited=true";
      setShowVideo(true);
    }

    if (loader && content) {
      // Hacer visible la pantalla de carga durante 1.5 segundos
      setTimeout(() => {
        loader.style.display = "none";
        content.classList.remove("hidden");
      }, 11000);
    }
  }, []);

  return (
    <div id="loader-wrapper">
      {showVideo ? (
        <video src="/storage/assets/videoLogoEterne.mp4" alt="Loading..." autoPlay muted/>
      ) : showImage ? (
        <img src="/storage/assets/logoEterne.png" alt="Loading..." />
      ) : null}
    </div>
  );
}

export default Loader;

const rootElement = document.getElementById('loader-wrapper');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<Loader />);
}