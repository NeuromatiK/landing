<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Post extends Fixture
{
    private const POSTS_COUNT = 20;

    public function load(ObjectManager $manager) : void
    {
        $fishText = explode("\n", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi in nulla posuere sollicitudin aliquam ultrices sagittis. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Nec nam aliquam sem et tortor. Suspendisse ultrices gravida dictum fusce ut. Mi bibendum neque egestas congue quisque egestas diam in. Maecenas accumsan lacus vel facilisis volutpat. Nibh mauris cursus mattis molestie a. Nisi porta lorem mollis aliquam ut porttitor leo a diam. Ultrices in iaculis nunc sed augue. Integer enim neque volutpat ac tincidunt vitae semper quis lectus. Eget dolor morbi non arcu risus quis varius quam quisque. Pharetra vel turpis nunc eget lorem. Sed nisi lacus sed viverra tellus in hac habitasse. Auctor eu augue ut lectus arcu bibendum. Eu turpis egestas pretium aenean. Arcu bibendum at varius vel. Dui faucibus in ornare quam viverra orci.
        Laoreet sit amet cursus sit. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Morbi tristique senectus et netus et malesuada fames ac turpis. Sagittis vitae et leo duis ut diam quam. Leo duis ut diam quam. Viverra tellus in hac habitasse platea dictumst. Donec adipiscing tristique risus nec feugiat. Sapien eget mi proin sed. Fringilla est ullamcorper eget nulla. Id diam vel quam elementum pulvinar etiam non quam. Eu augue ut lectus arcu bibendum at varius vel pharetra. In mollis nunc sed id. Nunc id cursus metus aliquam eleifend mi in. Vel eros donec ac odio tempor orci dapibus. Semper auctor neque vitae tempus quam pellentesque.
        Faucibus ornare suspendisse sed nisi lacus sed viverra. Duis ut diam quam nulla porttitor massa id neque. Mi eget mauris pharetra et ultrices neque ornare aenean. Diam maecenas sed enim ut sem viverra aliquet eget sit. Cursus sit amet dictum sit. Tortor consequat id porta nibh venenatis cras. Tristique risus nec feugiat in. Dictum at tempor commodo ullamcorper a lacus vestibulum sed arcu. Eu ultrices vitae auctor eu augue. Facilisis volutpat est velit egestas dui id ornare arcu odio. Lorem dolor sed viverra ipsum nunc. Ut tortor pretium viverra suspendisse potenti nullam ac. Elit scelerisque mauris pellentesque pulvinar. Commodo ullamcorper a lacus vestibulum. Et magnis dis parturient montes nascetur ridiculus. Integer malesuada nunc vel risus commodo.
        Aliquam ut porttitor leo a diam sollicitudin. Placerat duis ultricies lacus sed turpis tincidunt id aliquet risus. Venenatis tellus in metus vulputate. Egestas maecenas pharetra convallis posuere. Quis imperdiet massa tincidunt nunc pulvinar sapien et. Aliquam ultrices sagittis orci a scelerisque purus semper eget. Sed nisi lacus sed viverra tellus. Orci sagittis eu volutpat odio facilisis mauris sit. Habitant morbi tristique senectus et netus et. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Etiam non quam lacus suspendisse faucibus interdum. Vulputate ut pharetra sit amet aliquam. In nibh mauris cursus mattis molestie a iaculis at erat. Arcu odio ut sem nulla pharetra diam. Adipiscing at in tellus integer feugiat. Fringilla ut morbi tincidunt augue interdum velit euismod in.
        Eget est lorem ipsum dolor sit amet. Placerat duis ultricies lacus sed. Nunc mi ipsum faucibus vitae aliquet. Ut lectus arcu bibendum at. At elementum eu facilisis sed odio morbi quis. Nisl suscipit adipiscing bibendum est ultricies. Quis eleifend quam adipiscing vitae proin sagittis nisl. Sed pulvinar proin gravida hendrerit lectus a. Felis imperdiet proin fermentum leo vel orci porta non pulvinar. Lectus sit amet est placerat in egestas. Congue eu consequat ac felis donec et odio pellentesque diam. Viverra mauris in aliquam sem fringilla. Accumsan lacus vel facilisis volutpat est velit egestas dui. Praesent semper feugiat nibh sed pulvinar. Metus aliquam eleifend mi in nulla. Risus quis varius quam quisque. Diam sit amet nisl suscipit adipiscing bibendum. Purus in massa tempor nec feugiat nisl.");

        for ($i = 0 ; $i < self::POSTS_COUNT ; $i++) {
            $post = new \App\Entity\Post();
            $post->setTitle('Post #' . $i + 1);
            $post->setDescription(trim($fishText[ random_int(0, count($fishText) - 1) ]));
            $post->setUri('post-' . $i);
            $manager->persist($post);
        }
        $manager->flush();
    }
}
