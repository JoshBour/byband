<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $artists = $this->getEntityManager()->getRepository('\Artist\Entity\Artist')->findAll();

        $user = $this->getEntityManager()->getRepository('\User\Entity\User')->find(5);

        var_dump($user->getFriendList()[1]->getUserId());
        return new ViewModel();
    }
}
