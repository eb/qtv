project('qtv', 'c')

if meson.get_compiler('c').get_id() == 'gcc'
    add_global_link_arguments('-static-libgcc', language: 'c')
endif

qtv_sources = [
	'src/ban.c',
	'src/build.c',
	'src/cl_cmds.c',
	'src/cmd.c',
	'src/crc.c',
	'src/cvar.c',
	'src/forward.c',
	'src/forward_pending.c',
	'src/fs.c',
	'src/httpsv.c',
	'src/httpsv_generate.c',
	'src/info.c',
	'src/main.c',
	'src/mdfour.c',
	'src/msg.c',
	'src/net_utils.c',
	'src/parse.c',
	'src/qw.c',
	'src/source.c',
	'src/source_cmds.c',
	'src/sys.c',
	'src/token.c',
	'src/sha3.c',
	'src/udp.c'
]

executable('qtv', qtv_sources,
	dependencies : [
		meson.get_compiler('c').find_library('ws2_32', required : false)
	]
)
