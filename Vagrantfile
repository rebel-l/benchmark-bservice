# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	# Setup for all machines
	config.vm.provision "shell", inline: "echo Starting Vagrant ..."
	config.vm.box = "Ubuntu14.04LTS"
	config.ssh.insert_key = false	# Avoid that vagrant removes default insecure key

    # Provider-specific configuration
    config.vm.provider "virtualbox" do |vb|
        vb.memory = 384
# 		vb.gui = true
    end

	# Setup for Benchmark executor machine only
	config.vm.define "BenchmarkExecutor", autostart: true do |be|
		be.vm.network "private_network", ip: "192.168.34.2"

		be.vm.provider "virtualbox" do |vb|
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
			chef.add_role "Default"
		end
	end

	# Setup for PhpService machine only
	config.vm.define "PhpService", autostart: true do |phps|
		phps.vm.network "private_network", ip: "192.168.34.3"

		# Chef Configuration
		phps.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.environment = "development"
			chef.add_role "WebServer"

			chef.json = {
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

	# Setup for GoService machine only
	config.vm.define "GoService", autostart: true do |gos|
		gos.vm.network "private_network", ip: "192.168.34.4"

		# Chef Configuration
		gos.vm.provision "chef_solo" do |chef|
			chef.cookbooks_path = "./vendor/rebel-l/sisa/cookbooks"
			chef.roles_path = "./vendor/rebel-l/sisa/roles"
			chef.environments_path = "./vendor/rebel-l/sisa/environments"
			chef.data_bags_path = "./vendor/rebel-l/sisa/data_bags"
			chef.add_role "Default"
			chef.environment = "development"
		end
	end
end