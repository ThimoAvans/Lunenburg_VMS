<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

//EntiteitType vervangen door b.v. KlantType
class OntvangenGoederenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('artikelnummer', EntityType::class, array(
            'class'=> 'AppBundle:Artikel',
            'choice_label' => 'artikelnummer', 'expanded' => false));
        $builder
            ->add('ontvangstnummer', IntegerType::class);
        $builder
            ->add('datumontvangst', DateType::class); 
        $builder
            ->add('hoeveelheid', IntegerType::class);
        $builder
            ->add('kwaliteit', TextType::class);
        $builder
            ->add('omschrijving', TextType::class);
        $builder
            ->add('leverancier', TextType::class);
        $builder
        ->add('Ontvangen', ChoiceType::class, array(
        'choices'  => array( 
        'Ja' => "Ontvangen",
        'Nee' => "Niet Ontvangen",
    ),
));

                                                                                       	 
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\OntvangenGoederen', 
		));
	}
}

?>