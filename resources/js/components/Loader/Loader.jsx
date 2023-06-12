import React, { useEffect } from 'react';
import ReactDOM from 'react-dom/client';

const Loader = () => {
  useEffect(() => {
    const loader = document.getElementById("loader-wrapper");
    const content = document.getElementById("content-wrapper");

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
      {/* <img src="/storage/assets/logoEterne.png" alt="Loading..." /> */}
      <video src="/storage/assets/videoLogoEterne.mp4" alt="Loading..." autoPlay muted/>
    </div>
  );
}

export default Loader;

const rootElement = document.getElementById('loader-wrapper');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<Loader />);
}
