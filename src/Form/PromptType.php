<?php

namespace App\Form;

use App\Entity\Prompt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Titre du prompt'
            ])
            ->add('content', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'rows' => 10],
                'label' => 'Contenu du prompt'
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'IA Générative' => 'ai_generative',
                    'ChatGPT' => 'chatgpt',
                    'Midjourney' => 'midjourney',
                    'Stable Diffusion' => 'stable_diffusion',
                    'Autre' => 'other'
                ],
                'attr' => ['class' => 'form-control'],
                'label' => 'Catégorie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prompt::class,
        ]);
    }
}