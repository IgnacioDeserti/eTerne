import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
import './components/MenuHamburguesa/MenuHamburguesa';
import './components/Login-Register/RegisterBox';
import './components/Login-Register/LoginBox';
import './components/ProductsSection/ProductsSection';
import './components/Carousel/Carousel';

