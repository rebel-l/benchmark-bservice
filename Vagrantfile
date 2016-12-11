# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	# Setup for all machines
	config.vm.provision "shell", inline: "echo Starting Vagrant ..."
	config.vm.box = "Ubuntu1604"
	config.vm.box_url = "https://www.dropbox.com/s/g5tzb35b58sr6tr/ubuntu1604lts5110.box?dl=1"
	config.ssh.insert_key = false	# Avoid that vagrant removes default insecure key

	# Host manager setup
    config.hostmanager.enabled				= true
    config.hostmanager.manage_host			= true
    config.hostmanager.manage_guest			= true
    config.hostmanager.ignore_private_ip	= false
    config.hostmanager.include_offline		= true

    # Provider-specific configuration
    config.vm.provider "virtualbox" do |vb|
        vb.memory = 384
# 		vb.gui = true
    end

	# Setup for Benchmark executor machine only
	config.vm.define "BenchmarkExecutor", autostart: true do |be|
		be.vm.network "private_network", ip: "192.168.34.2"
		be.vm.hostname = 'be.dev'

		be.vm.provider "virtualbox" do |vb|
			vb.name = "Benchmark-Executor"
			vb.memory = 1024
# 			vb.gui = true
		end

		# Chef Configuration
		be.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.environment = "development"
			chef.add_role "ToolBox"
		end
	end

	# Setup for PhpNginxService machine only
	config.vm.define "PhpNginxService", autostart: true do |phps|
	    phps.vm.provider "virtualbox" do |vb|
            vb.name = "Benchmark-PhpNginxService"
            vb.cpus = 2
        end

		phps.vm.network "private_network", ip: "192.168.34.3"
		phps.vm.hostname = 'phps.dev'

		# Chef Configuration
		phps.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.environment = "development"
			chef.add_role "WebServer"

			chef.json = {
			    'Php' => {
			        'default' => {
			            'version' => '7.0'
			        }
			    },
				'projects' => [
					{
						'name'			=> 'benchmark',
						'type'			=> 'service',
						'server_name'	=> '192.168.34.3',
						'root'			=> '/vagrant/src/php',
						'index'			=> 'index.php'
					}
				]
			}
		end
	end

	# Setup for PhpService with Apache machine only
	config.vm.define "PhpApacheService", autostart: false do |phpas|
	    phpas.vm.provider "virtualbox" do |vb|
            vb.name = "Benchmark-PhpApacheService"
        end

		phpas.vm.network "private_network", ip: "192.168.34.5"
		phpas.vm.hostname = 'phpas.dev'

		# Chef Configuration
		phpas.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.add_role "Default"
			chef.environment = "development"

			chef.json = {
				'Iptables' => {
					'WEBSERVER'		=> 'On'
				}
			}
		end
	end

	# Setup for PhpService with Apache and PHP FPM machine only
	config.vm.define "PhpApacheFPMService", autostart: false do |phpafs|
	    phpafs.vm.provider "virtualbox" do |vb|
            vb.name = "Benchmark-PhpApacheFPMService"
        end

		phpafs.vm.network "private_network", ip: "192.168.34.6"
		phpafs.vm.hostname = 'phpafs.dev'

		# Chef Configuration
		phpafs.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.add_role "Default"
			chef.environment = "development"

			chef.json = {
				'Iptables' => {
					'WEBSERVER'		=> 'On'
				}
			}
		end
	end

	# Setup for GoService machine only
	config.vm.define "GoService", autostart: true do |gos|
	    gos.vm.provider "virtualbox" do |vb|
            vb.name = "Benchmark-GoService"
        end

		gos.vm.network "private_network", ip: "192.168.34.4"
		gos.vm.hostname = 'gos.dev'

		# Chef Configuration
		gos.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.add_role "Default"
			chef.environment = "development"
			chef.add_recipe "GolangCompiler"

			chef.json = {
			    'Golang' => {
			        'version' => '1.7.4'
			    },
			    'System' => {
                    'Iptables' => {
                        'TCP'	=> {
                            'Ports' => [8080]
                        }
                    }
                }
			}
		end
	end

	# Setup for NodeJsService machine only
	config.vm.define "NodeJsService", autostart: true do |njs|
	    njs.vm.provider "virtualbox" do |vb|
            vb.name = "Benchmark-NodeJsService"
            vb.cpus = 2
        end

		njs.vm.network "private_network", ip: "192.168.34.7"
		njs.vm.hostname = 'njs.dev'

		# Chef Configuration
		njs.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.add_role "Default"
			chef.environment = "development"
			chef.add_recipe "NodeJs"

			chef.json = {
			    'NodeJs' => {
			        'version' => '7.2.1'
			    },
				'System' => {
                    'Iptables' => {
                        'TCP'	=> {
                            'Ports' => [8080]
                        }
                    }
                }
			}
		end
	end

	# Setup for PythonApacheService with Apache machine only
	config.vm.define "PythonApacheService", autostart: false do |pyas|
	    pyas.vm.provider "virtualbox" do |vb|
            vb.name = "Benchmark-PythonApacheService"
        end

		pyas.vm.network "private_network", ip: "192.168.34.8"
		pyas.vm.hostname = 'pyas.dev'

		# Chef Configuration
		pyas.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.add_role "Default"
			chef.environment = "development"

			chef.json = {
				'Iptables' => {
					'WEBSERVER'		=> 'On'
				}
			}
		end
	end
end
