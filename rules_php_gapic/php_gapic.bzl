# Copyright 2021 Google LLC
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#      https://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

load("@com_google_api_codegen//rules_gapic:gapic.bzl", "proto_custom_library", "GapicInfo")

def php_proto_library(name, deps, plugin_args = [], **kwargs):
    srcjar_target_name = name
    proto_custom_library(
        name = srcjar_target_name,
        deps = deps,
        output_type = "php",
        output_suffix = ".srcjar",
        plugin_args = plugin_args,
        extra_args = [
            "--include_source_info",
        ],
        **kwargs
    )

def php_grpc_library(name, srcs, deps, plugin_args = [], **kwargs):
    srcjar_target_name = name

    # `deps` is not used now but may be used if php_grpc_library ever tries to "compile" its output
    proto_custom_library(
        name = srcjar_target_name,
        deps = srcs,
        plugin = Label("@com_github_grpc_grpc//src/compiler:grpc_php_plugin"),
        plugin_args = ["class_suffix=GrpcClient"] + plugin_args,
        output_type = "grpc",
        output_suffix = ".srcjar",
        extra_args = [
            "--include_source_info",
        ],
        **kwargs
    )

def php_gapic_srcjar(
        name,
        src,
        gapic_yaml,
        service_yaml,
        package,
        grpc_service_config = None,
        transport = None,
        **kwargs):

    plugin_file_args = {}
    if grpc_service_config:
        plugin_file_args[grpc_service_config] = "grpc-service-config"

    proto_custom_library(
        name = name,
        deps = src,
        plugin = Label("//rules_php_gapic:php_gapic_generator_binary"),
        plugin_file_args = plugin_file_args,
        output_type = "gapic",
        output_suffix = ".srcjar",
        **kwargs
    )

def _php_gapic_library_add_gapicinfo_impl(ctx):
    return [
        DefaultInfo(files = depset(direct = [ctx.file.output])),
        GapicInfo(),
    ]

_php_gapic_library_add_gapicinfo = rule(
    implementation = _php_gapic_library_add_gapicinfo_impl,
    attrs = {
        "output": attr.label(allow_single_file = True)
    }
)

def php_gapic_library(
        name,
        src,
        gapic_yaml,
        service_yaml,
        package = None,
        deps = [],
        grpc_service_config = None,
        transport = None,
        **kwargs):
    srcjar_name = "%s_srcjar" % name

    php_gapic_srcjar(
        name = srcjar_name,
        src = src,
        gapic_yaml = gapic_yaml,
        service_yaml = service_yaml,
        package = package,
        grpc_service_config = grpc_service_config,
        transport = transport,
        **kwargs
    )

    _php_gapic_library_add_gapicinfo(
        name = name,
        output = ":{srcjar_name}".format(srcjar_name = srcjar_name),
    )
