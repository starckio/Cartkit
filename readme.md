#KirbyCart

    git clone --recursive https://github.com/dsply/cartkit.git

![Image Alt](cartkit.png)

Voila, le projet est déjà bien avancé.
L’aide dont j’ai besoin maintenant et de faire un vrai Plugin à 100% et non pas à 50% comme c’est le cas en ce moment.

Pour comprendre j'ai fais un copié collé du template "cart" en "cart-test" (situé à site/template/cart-test.php)

L'affichage des produits d'un coté et le formulaire PayPal d'un autre.

J'aimerais que le plugin gère directement ce-ci:

    <?php $i=0; $count = 0; $total = 0; ?>
    <?php foreach($cart as $id => $quantity): ?>
    <?php if($product = $products->findByURI($id)): ?>
    <?php $i++; ?>
    <?php $count += $quantity ?>
    
    <!-- Affichage des produits dans le template. -->
    
    <?php $total += $prodtotal ?>
    <?php endif; ?>
    <?php endforeach; ?>


J'espère être comprehensible, n'hésite pas a m'écrire si vous avez besoin de plus d'informations.

---

# Kirby

Kirby is a file-based CMS.
Easy to setup. Easy to use. Flexible as hell.

## Trial

You can try Kirby on your local machine or on a test
server as long as you need to make sure it is the right
tool for your next project.

## Buy a license

You can purchase your Kirby license at
<http://getkirby.com/buy>

A Kirby license is valid for a single domain. You can find
Kirby's license agreement here: <http://getkirby.com/license>

## The Starterkit

Kirby's Starterkit comes with a small demo website and a fully
configured panel. Feel free to modify it and play with it as
much as you like.

## The Panel

You can find the login for Kirby's admin interface at
http://yourdomain.com/panel. You will be guided through the signup
process for your first user, when you visit the panel
for the first time.

## Installation

Kirby does not require a database, which makes it very easy to
install. Just copy Kirby's files to your server and visit the
URL for your website in the browser.

**Please check if the invisible .htaccess file has been
copied to your server correctly**

### Requirements

Kirby runs on PHP 5.3+, Apache or Nginx.

### Download

You can download the latest version of the Starterkit
from http://download.getkirby.com

### With Git

If you are familiar with Git, you can clone Kirby's
Starterkit repository from Github.

    git clone --recursive https://github.com/getkirby/starterkit.git

## Documentation
<http://getkirby.com/docs>

## Issues and feedback

If you have a Github account, please report issues
directly on Github:

- <https://github.com/getkirby/kirby/issues>
- <https://github.com/getkirby/panel/issues>
- <https://github.com/getkirby/starterkit/issues>

Otherwise you can use Kirby's forum: http://getkirby.com/forum
or send us an email: <support@getkirby.com>

## Support
<http://getkirby.com/support>

## Copyright

© 2009-2014 Bastian Allgeier (Bastian Allgeier GmbH)
<http://getkirby.com>