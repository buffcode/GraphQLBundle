<?php

declare(strict_types=1);

namespace Overblog\GraphQLBundle\Tests\Config\Parser\fixtures\annotations\Type;

use Overblog\GraphQLBundle\Annotation as GQL;
use Overblog\GraphQLBundle\Tests\Config\Parser\fixtures\annotations\Union\Killable;

/**
 * @GQL\Type(interfaces={"Character"}, resolveField="value")
 * @GQL\Description("The Sith type")
 * @GQL\Access("isAuthenticated()")
 * @GQL\IsPublic("isAuthenticated()")
 */
#[GQL\Type(interfaces: ['Character'], resolveField: 'value')]
#[GQL\Description('The Sith type')]
#[GQL\Access('isAuthenticated()')]
#[GQL\IsPublic('isAuthenticated()')]
final class Sith extends Character implements Killable
{
    /**
     * @GQL\Field(type="String!")
     * @GQL\Access("hasRole('SITH_LORD')")
     */
    #[GQL\Access("hasRole('SITH_LORD')")]
    #[GQL\Field(type: 'String!')]
    protected string $realName;

    /**
     * @GQL\Field(type="String!")
     * @GQL\IsPublic("hasRole('SITH_LORD')")
     */
    #[GQL\IsPublic("hasRole('SITH_LORD')")]
    #[GQL\Field(type: 'String!')]
    protected string $location;

    /**
     * @GQL\Field(type="Sith", resolve="service('master_resolver').getMaster(value)")
     */
    #[GQL\Field(type: 'Sith', resolve: "service('master_resolver').getMaster(value)")]
    protected Sith $currentMaster;

    /**
     * @GQL\Field(type="[Character]", name="victims")
     * @GQL\Arg(name="jediOnly", type="Boolean", description="Only Jedi victims", default=false)
     */
    #[GQL\Field(type: '[Character]', name: 'victims')]
    #[GQL\Arg(name: 'jediOnly', type: 'Boolean', description: 'Only Jedi victims', default: false)]
    public function getVictims(bool $jediOnly = false): array
    {
        return [];
    }
}
