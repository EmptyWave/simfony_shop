<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 19.09.2019
 * Time: 0:43
 */

namespace Service\SocialNet;


class SocialNet
{
  public function create(string $socialNet):SocialNetInterface
  {
    switch ($socialNet){
      case SocialNetInterface::SOCIAL_NET['VK']:
        return new VkAdapter();
      case SocialNetInterface::SOCIAL_NET['Face']:
        return new FacebookAdapter();
      case SocialNetInterface::SOCIAL_NET['OK']:
        return new OkAdapter();
      case SocialNetInterface::SOCIAL_NET['Insta']:
        return new InstaAdapter();
      default:
        throw new \LogicException('oops');
    }
  }
}