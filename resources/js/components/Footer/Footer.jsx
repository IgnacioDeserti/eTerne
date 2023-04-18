import React from 'react';
import ReactDOM from 'react-dom/client';

const Footer = () => {
  return (
    <div className="footer-container">
      <ul className="contact-info">
        <li><i className="fas fa-map-marker-alt"></i> 1234 Calle Falsa, Ciudad Ficticia</li>
        <li><i className="fas fa-phone"></i> (123) 456-7890</li>
        <li><i className="fas fa-envelope"></i> info@tusitio.com</li>
      </ul>
      <div className="social-icons">
        <a target="_blank" href="https://web.whatsapp.com/send?phone=542234268951"><i className="fab fa-whatsapp"></i></a>
        <a target="_blank" href="https://www.instagram.com/"><i className="fab fa-instagram"></i></a>
      </div>
    </div>
  );
};

export default Footer;

const rootElement = document.getElementById('footer');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<Footer />);
}