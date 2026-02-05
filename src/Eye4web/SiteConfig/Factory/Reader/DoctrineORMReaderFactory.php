<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Eye4web\SiteConfig\Factory\Reader;

use Doctrine\ORM\EntityManager;
use Eye4web\SiteConfig\Options\ModuleOptions;
use Eye4web\SiteConfig\Reader\DoctrineORMReader;
use Laminas\ServiceManager\Factory\FactoryInterface;

class DoctrineORMReaderFactory implements FactoryInterface {

    /**
     * @param \Interop\Container\ContainerInterface $container
     * @param string $requestedName
     * @param array $options
     * @return DoctrineORMReader
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, ?array $options = null): object {
        $objectManager = $container->get(EntityManager::class);
        $moduleOptions = $container->get(ModuleOptions::class);

        $reader = new DoctrineORMReader($objectManager, $moduleOptions);

        return $reader;
    }

}
